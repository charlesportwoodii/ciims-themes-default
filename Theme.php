<?php

// Load the local autoloder if it exists
if (file_exists(__DIR__.DS.'vendor'.DS.'autoload.php'))
	require __DIR__.DS.'vendor'.DS.'autoload.php';

// Import CiiSettingsModel
Yii::import('application.modules.dashboard.components.CiiSettingModel');
class Theme extends CiiThemesModel
{
	/**
     * @var string  The theme name
     */
	public $theme = 'default';

	/**
     * @var string  The user's twitter handle
     */
	protected $twitterHandle = NULL;

    /**
     * @var string  The number of tweets to fetch for display
     */
	protected $twitterTweetsToFetch = 0;

	/**
     * @var string  The user's facebook numeric ID
     */
	protected $facebookUserId = NULL;

	/**
	 * @var string 	The Google+ Public Server API Key
	 */
	protected $googlePlusAPIKey = NULL;

	/**
	 * @var string My Google+ User ID
	 */
	protected $googlePlusUserId = NULL;

	/**
     * Validation Rules
     * @return array
     */
	public function rules()
	{
		return array(
			array('twitterHandle, facebookUserId, googlePlusAPIKey, googlePlusUserId', 'length', 'max' => 255),
			array('twitterTweetsToFetch', 'numerical', 'integerOnly' => true, 'min' => 0),
		);
	}

    /**
     * Dashboard Groupings
     * @return array
     */
	public function groups()
	{
		return array(
			Yii::t('DefaultTheme', 'Twitter Settings') => array('twitterHandle', 'twitterTweetsToFetch'),
			Yii::t('DefaultTheme', 'Facebook Settings') => array('facebookUserId'),
			Yii::t('DefaultTheme', 'Google+ Settings') => array('googlePlusAPIKey', 'googlePlusUserId'),
		);
	}

    /**
     * Attribute Labels
     * @return array
     */
	public function attributeLabels()
	{
		return array(
			'twitterHandle'        => Yii::t('DefaultTheme', 'Twitter Handle'),
			'twitterTweetsToFetch' => Yii::t('DefaultTheme', 'Number of Tweets to Fetch'),
			'facebookUserId' 	   => Yii::t('Defaulttheme', 'Facebook User ID'),
			'googlePlusAPIKey'	   => Yii::t('Defaulttheme', 'Google+ Public API Key (server)'),
			'googlePlusUserId'	   => Yii::t('DefaultTheme', 'Your Google+ User ID')
		);
	}

	/**
     * AfterSave Event
     * Clears the local cache
     */
	public function afterSave()
	{
		// Bust the cache
		Yii::app()->cache->delete($this->theme . '_settings_tweets');
		Yii::app()->cache->delete($this->theme . '_settings_facebook_data');
		Yii::app()->cache->delete($this->theme . '_settings_g+_activities');
		return parent::afterSave();
	}

	/**
	 * getTweets callback method
	 * @param  array $postdata    	$_POST response data
	 */
	public function getTweets($postData=NULL)
	{
		header("Content-Type: application/json");

		if ($this->twitterHandle == NULL || $this->twitterTweetsToFetch == 0)
			return false;

    	try {
    		$connection = new TwitterOAuth(
        		Cii::getConfig('ha_twitter_key', NULL, NULL), 
        		Cii::getConfig('ha_twitter_secret', NULL, NULL),
        		Cii::getConfig('ha_twitter_accessToken', NULL, NULL),
        		Cii::getConfig('ha_twitter_accessTokenSecret', NULL, NULL)
    		);
    		
    		$tweets = Yii::app()->cache->get($this->theme . '_settings_tweets');

    		if ($tweets == false)
    		{
				$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name={$this->twitterHandle}&include_rts=false&exclude_replies=true&count={$this->twitterTweetsToFetch}");
				foreach ($tweets as &$tweet)
	            {
					$tweet->text = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\">$1</a>", $tweet->text);
					$tweet->text = preg_replace("/#([A-Za-z0-9\/\.]*)/", "<a target=\"_new\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $tweet->text);
					$tweet->text = preg_replace("/@([A-Za-z0-9\/\.]*)/", "<a href=\"http://www.twitter.com/$1\">@$1</a>", $tweet->text);
				}

				// Cache the result for 15 minutes
				if (!isset($tweets->errors))
					Yii::app()->cache->set($this->theme . '_settings_tweets', $tweets, 900);
			}

			echo CJSON::encode($tweets);
		} catch (Exception $e) {
			echo CJSON::encode(array('errors' => array(array('message' => $e->getMessage()))));
		}
		Yii::app()->end();
	}

	/**
	 * getFacebookPosts callback method
	 * Retrieves recent status/stories(?) from Facebook
	 * @param  array $postdata    	$_POST response data
	 */
	public function getFacebookPosts($postData=NULL)
	{
		if ($this->facebookUserId == NULL)
			return false;

		$result = Yii::app()->cache->get($this->theme . '_settings_facebook_data');

		if ($result == false)
		{
			$config = array(
		    	'appId' => Cii::getConfig('ha_facebook_id', NULL, NULL),
		      	'secret' => Cii::getConfig('ha_facebook_secret', NULL, NULL),
		      	'fileUpload' => false,
		      	'allowSignedRequest' => false,
		  	);

		  	$facebook = new Facebook($config);

		  	$user_id = Cii::getConfig('ha_facebook_user_id', NULL, NULL);

		  	try {
			  	$result = $facebook->api('/'.$user_id.'/feed/');
			  	Yii::app()->cache->set($this->theme.'_settings_facebook_data', $result, 900);
			  	return $result;
			} catch(FacebookApiException $e) {
				return $e->getMessage();
	      	}
      	}
      	else
      		return $result;

      	Yii::app()->end();
	}

	/**
	 * getGooglePlusPosts callback method
	 * Retrieves recent activities from Google+
	 * @param  array $postdata    	$_POST response data
	 */
	public function getGooglePlusPosts($postData=NULL)
	{
		if ($this->googlePlusAPIKey == NULL || $this->googlePlusUserId == NULL)
			return false;

		$result = Yii::app()->cache->get($this->theme . '_settings_g+_activities');

		if ($result == false)
		{
			$client = new Google_Client();
			$client->setApplicationName("Client_Library_Examples");
			$client->setDeveloperKey($this->googlePlusAPIKey);

			$service = new Google_Service_Plus($client);

			$result = $service->activities->listActivities($this->googlePlusUserId, 'public');

			Yii::app()->cache->set($this->theme . '_settings_g+_activities',$result, 900);
		}
		return $result;
	}
}

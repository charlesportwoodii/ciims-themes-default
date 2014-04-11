<?php $this->beginContent('//layouts/main'); ?>
	<div class="content">
		<div class="pure-u-2-3 content-inner">
			<?php echo $content; ?>
		</div>
		<div class="sidebar pure-u-1-3 pull-right">
			<?php echo CHtml::beginForm($this->createUrl('/search'), 'get', array('id' => 'search', 'class' => 'pure-form')); ?>
            	<?php echo CHtml::textField('q', Cii::get($_GET, 'q', ''), array('type' => 'text', 'class' => 'pure-u-1', 'placeholder' => Yii::t('DefaultTheme.main', 'Type to search, then press enter'))); ?>
            <?php echo CHtml::endForm(); ?>


            <h4><?php echo Yii::t('DefaultTheme.main', 'Categories'); ?></h4>
			<?php $this->widget('zii.widgets.CMenu', array(
                'items' => $this->theme->getCategories()
            )); ?>

            <h4><?php echo Yii::t('DefaultTheme.main', 'Recent Posts'); ?></h4>
			<?php $this->widget('zii.widgets.CMenu', array(
                'items' => $this->theme->getRecentPosts()
            )); ?>

			<!-- Recent Tweets -->
			<?php if ($this->theme->twitterHandle != NULL && $this->theme->twitterTweetsToFetch > 0): ?>
				<h4><?php echo Yii::t('DefaultTheme.main', 'Recent Tweets'); ?></h4>
				<?php Yii::app()->clientScript->registerScript('loadRecentTweets', '$(document).ready(function() { Theme.Callbacks.getTweets(); });'); ?>
				<div id="twitterFeed"></div>
			<?php endif; ?>

			<!-- Recent Facebook Posts -->
			<?php if ($this->theme->facebookUserId != NULL): ?>
				<h4><?php echo Yii::t('DefaultTheme.main', 'Recent Facebook Stories'); ?></h4>
				<?php Yii::app()->clientScript->registerScript('loadRecentFBStories', '$(document).ready(function() { Theme.Callbacks.getFacebookPosts(); });'); ?>
				<div id="fbFeed"></div>
			<?php endif; ?>

			<!-- Recent Google+ Activities -->
			<?php if ($this->theme->googlePlusAPIKey != NULL && $this->theme->googlePlusUserId != NULL): ?>
				<h4><?php echo Yii::t('DefaultTheme.main', 'Recent Google+ Activities'); ?></h4>
				<?php Yii::app()->clientScript->registerScript('loadRecentG+Activities', '$(document).ready(function() { Theme.Callbacks.getGooglePlusActivities(); });'); ?>
				<div id="gpFeed"></div>
			<?php endif; ?>
		</div>
	</div>
	<div class="clearfix"></div>
<?php $this->endContent(); ?>

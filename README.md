## CiiMS Default 2014 Theme

[![Latest Version](http://img.shields.io/packagist/v/ciims-themes/default.svg?style=flat)]()
[![Downloads](http://img.shields.io/packagist/dt/ciims-themes/default.svg?style=flat)]()
[![Gittip](http://img.shields.io/gittip/charlesportwoodii.svg?style=flat "Gittip")](https://www.gittip.com/charlesportwoodii/)
[![License](http://img.shields.io/badge/license-MIT-orange.svg?style=flat "License")](https://github.com/charlesportwoodii/ciims-themes-default/blob/master/LICENSE.md)

This is the default theme that comes prebundled with CiiMS

### Building Assets

 Asset management is done via node.js and grunt. To make changes to any of the assets/src files, install the npm dependencies, and regrunt

     npm install
     grunt

Or use ```grunt watch```

    nohup grunt watch &

Before packaging, be sure to run the build command to generate the minified assets

    grunt build
    
### Provided Functionlaity

This theme provides the basic functionality to pull Tweets from Twitter, and timeline updates from Facebook and Google+. To make use of these features, you __MUST__ create an application on those services and generate OAuth API Tokens. These keys are added on the ```/dashboard/settings/social``` page.

Applications and keys can be generated at the following sites:

__Google+:__ https://code.google.com/apis/console/
__Facebook:__ https://developers.facebook.com/apps
__Twitter:__ https://dev.twitter.com/apps

### Options

The following options are made available through ```dashboard/settings/theme```

#### Twitter

Settings to connect to Twitter.

###### Twitter Handle

The twitter handle of the user you want to retrieve tweets from. eg ```@charlesportwood```

###### Twitter Tweets to Fetch

The number of tweets you want to retrieve, as an integer

#### Facebook

Settings to connect to Facebook.

###### Facebook User ID

This corresponds to the numerical facebook user id. Use a tool like [http://findmyfacebookid.com/](http://findmyfacebookid.com/) to retrieve yours

#### Google+

Settings to connect to Google+.

Note that Google+ Settings have 2 sets of keys, a OAuth Key, and a Public API Access Server Key. For these settings to work you'll need a Public API Access Server key added to the dashboard settings page

###### Google+ User ID

This corresponds to the numerical google+ user id. As of 2014, you can use the instructions found at [http://www.twelveskip.com/tutorials/google-plus/1134/how-to-find-your-google-plus-id-number](http://www.twelveskip.com/tutorials/google-plus/1134/how-to-find-your-google-plus-id-number) to retrieve yours.

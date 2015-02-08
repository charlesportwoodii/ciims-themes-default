<?php echo Yii::t('themes.default.main', 'Hello,'); ?><br />
<?php echo Yii::t('themes.default.main', 'An administrator at {{blog}} has invited you to collaborate at their site at {{site}}. To accept this invitation and to setup your account, click the following link {{link}}.', array(
	'{{blog}}' => Cii::getConfig('name'),
	'{{site}}' => Yii::app()->getBaseUrl(true),
	'{{link}}' => CHtml::link(Yii::app()->getBaseUrl(true) . '/acceptinvite/' . $hash, Yii::app()->getBaseUrl(true) . '/acceptinvite/' . $hash)
)); ?>
<br /><br />
<?php echo Yii::t('themes.default.main', 'If you do not wish to accept this invite, you may safely disregard this email.'); ?>
<br /><br />
<?php echo Yii::t('themes.default.main', 'Thank You,'); ?>
<br />
<?php echo Cii::getConfig('name'); ?>

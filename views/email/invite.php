<?php echo Yii::t('DefaultTheme', 'Hello,'); ?><br />
<?php echo Yii::t('DefaultTheme', 'An administrator at {{blog}} has invited you to collaborate at their site at {{site}}. To accept this invitation and to setup your account, click the following link {{link}}.', array(
	'{{blog}}' => Cii::getConfig('name'),
	'{{site}}' => Yii::app()->getBaseUrl(true),
	'{{link}}' => CHtml::link(Yii::app()->getBaseUrl(true) . '/acceptinvite/' . $hash, Yii::app()->getBaseUrl(true) . '/acceptinvite/' . $hash)
)); ?>
<br /><br />
<?php echo Yii::t('DefaultTheme', 'If you do not wish to accept this invite, you may safely disregard this email.'); ?>
<br /><br />
<?php echo Yii::t('DefaultTheme', 'Thank You,'); ?>
<br />
<?php echo Cii::getConfig('name'); ?>

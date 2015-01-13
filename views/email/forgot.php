<?php echo $user->username; ?>,<br /><br />
<?php echo Yii::t('themes.default., 'You recently notified us that you forgot your password for the following blog: {{blog}}. To reset your password, {{clickhere}} and follow the instructions on the reset page. This link is valid for 15 minutes.', array(
	'{{blog}}' => CHtml::link(Cii::getConfig('name', Yii::app()->name), Yii::app()->createAbsoluteUrl('/')),
	'{{clickhere}}' => CHtml::link(Yii::t('themes.default., 'click here'), Yii::app()->createAbsoluteUrl('/forgot/' . $hash))
)); ?>
<br /><br />
<?php echo Yii::t('themes.default., 'Thank you.'); ?><br /><br />
<?php echo Yii::t('themes.default., 'P.S. If you did not request this email, you may safely ignore it.'); ?>
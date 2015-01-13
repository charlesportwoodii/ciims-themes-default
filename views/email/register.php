<?php echo $user->username; ?>,<br /><br />
<?php echo Yii::t('themes.default., 'Thanks for registering your account at CiiMS Blog {{blog}}. To verify your account, {{clickhere}}. This action will verify your email address and allow you to interact with features only available to registered users.', array(
		'{{blog}}' => CHtml::link(Cii::getConfig('name', Yii::app()->name), Yii::app()->createAbsoluteUrl('/')),
		'{{clickhere}}' => CHtml::link(Yii::t('themes.default., 'click here'), Yii::app()->createAbsoluteUrl('/activation/'.$user->id.'/'.$hash))
)); ?>
<br /><br />
<?php echo Yii::t('themes.default., 'Thank you.'); ?><br /><br />
<?php echo Yii::t('themes.default., 'P.S. If you did not request this email, you may safely ignore it.'); ?>

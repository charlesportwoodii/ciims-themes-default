<?php echo $user->displayName; ?>,<br /><br />
<?php echo Yii::t('themes.spectre.main', 'Thanks for registering your account at CiiMS Blog {{blog}}. To verify your account, {{clickhere}}. This action will verify your email address and allow you to interact with features only available to registered users.', array(
		'{{blog}}' => CHtml::link(Cii::getConfig('name', Yii::app()->name), Yii::app()->createAbsoluteUrl('/')),
		'{{clickhere}}' => CHtml::link(Yii::t('themes.spectre.main', 'click here'), Yii::app()->createAbsoluteUrl('/activation/'.$hash))
)); ?>
<br /><br />
<?php echo Yii::t('themes.spectre.main', 'Thank you.'); ?><br /><br />
<?php echo Yii::t('themes.spectre.main', 'P.S. If you did not request this email, you may safely ignore it.'); ?>

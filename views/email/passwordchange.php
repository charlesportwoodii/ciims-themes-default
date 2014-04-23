<?php echo $user->displayName; ?>,<br /><br />
<?php echo Yii::t('DefaultTheme', 'This is a notification that your password has been changed on {{name}}', array(
    '{{name}}' => CHtml::link(Cii::getConfig('name'), Yii::app()->createAbsoluteUrl('/'))
)); ?>
<br /><br />
<?php echo Yii::t('DefaultTheme', 'Thank you.'); ?><br /><br />

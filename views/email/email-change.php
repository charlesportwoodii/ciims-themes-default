<?php $link = Yii::app()->createAbsoluteUrl('site/emailchange', array('key' => $key)); ?>

<?php echo $user->username; ?>,<br /><br />
<?php echo Yii::t('themes.default.main', 'This is a notification that a request to change your email address was made on {{name}}. To approve this change, please visit {{link}}', array(
    '{{name}}' => CHtml::link(Cii::getConfig('name'), Yii::app()->createAbsoluteUrl('/')),
    '{{link}}' => CHtml::link($link, $link)
)); ?>
<br /><br />
<?php echo Yii::t('themes.default.main', 'Thank you.'); ?><br /><br />

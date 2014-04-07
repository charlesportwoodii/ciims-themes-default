<div class="modal-container">
	<h1><?php echo Yii::t('DefaultTheme.main', 'Error {{code}}', array('{{code}}' => $error['code'])); ?></h1>
	<p><?php echo CHtml::encode($error['message']); ?></p>
</div>
<div class="clearfix"></div>

<?php $info = Yii::app()->user->hasFlash('activation-info'); ?>
<div class="modal-container">
    <h2><?php echo Yii::t('DefaultTheme.main', 'Activate your Account'); ?></h2>
    <hr />
    <?php if(Yii::app()->user->hasFlash('activation-error')):?>
		<div class="alert alert-error" style="margin-top: 20px;">
		  	<?php echo Yii::app()->user->getFlash('activation-error'); ?>
		</div>
	<?php endif; ?>
	
	<?php if(Yii::app()->user->hasFlash('activation-success')):?>
		<div class="alert alert-success" style="margin-top: 20px;">
		  	<?php echo Yii::app()->user->getFlash('activation-success'); ?>
		</div>
	<?php endif; ?>

	<?php if($info):?>
		<div class="alert alert-info" style="margin-top: 20px;">
		  	<?php echo Yii::app()->user->getFlash('activation-info'); ?>
		</div>
	<?php endif; ?>

    <?php if ($info):?>
	    <?php $form = $this->beginWidget('cii.widgets.CiiActiveForm', array(
	        'id'					=>	'login-form',
	        'registerPureCss'       => false,
	        'focus'					=>'	input[type="text"]:first',
	        'enableAjaxValidation'	=>	true,
	        'htmlOptions' => array(
	            'class' => 'pure-form pure-form-stacked'
	        )
	    )); ?>
	    <div>
	    	<?php echo CHtml::passwordField('password', Cii::get($_POST, 'password', NULL), array('class' => 'pure-u-1', 'placeholder' => Yii::t('DefaultTheme.main', 'Password'))); ?>
	        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('DefaultTheme.main', 'Submit'); ?></button>
	        <div class="clearfix"></div>
	    </div>
	    <?php $this->endWidget(); ?>
	<?php endif; ?>
</div>

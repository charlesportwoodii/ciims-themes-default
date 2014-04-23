<div class="modal-container">
    <h2 class="pull-left"><?php echo Yii::t('DefaultTheme.main', 'Change Your Email Address'); ?></h3>
    <hr class="clearfix"/>
    <p class="pull-text-left"><?php echo Yii::t('DefaultTheme.main', 'Enter your current password to change your email address.'); ?></p>
    <?php $form=$this->beginWidget('cii.widgets.CiiActiveForm', array(
        'id'					=> 'login-form',
        'focus'					=> 'input[type="text"]:first',
        'registerPureCss'       => false,
        'enableAjaxValidation'	=> true,
        'htmlOptions' => array(
            'class' => 'pure-form pure-form-stacked'
        )
    )); ?>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('password') )); ?>

        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('DefaultTheme.main', 'Submit'); ?></button>
        <div class="clearfix"></div>

    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>

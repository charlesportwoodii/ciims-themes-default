<div class="modal-container">
    <h2 class="pull-left"><?php echo Yii::t('themes.default.main', 'Forgot Your Password?'); ?></h3>
    <hr class="clearfix"/>
    <p class="pull-text-left"><?php echo Yii::t('themes.default.main', 'Did you forget your password? Enter your email address below and we\'ll send you an email link that will allow you to reset your password.'); ?></p>
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
        <?php echo $form->textField($model, 'email', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('email') )); ?>

        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('themes.default.main', 'Submit'); ?></button>
        <div class="clearfix"></div>

    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>

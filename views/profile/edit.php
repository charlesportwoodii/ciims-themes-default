<div class="modal-container edit-profile">
    <h2 class="pull-left"><?php echo Yii::t('DefaultTheme.main', 'Manage Your Details'); ?></h3>
    <hr class="clearfix"/>
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

        <div class="pure-group">
            <h3><?php echo Yii::t('DefaultTheme.main', 'Enter Your Current Password'); ?></h3>
            <p><?php echo Yii::t('DefaultTheme.main', 'Enter your current password to make any changes to your account'); ?></p>
            <?php echo $form->passwordField($model, 'currentPassword', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('currentPassword') )); ?>
        </div>

        <div class="pure-group">
            <h3><?php echo Yii::t('DefaultTheme.main', 'Change Your Password'); ?></h3>
            <?php echo $form->passwordField($model, 'password', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('password') )); ?>
            <?php echo $form->passwordField($model, 'password_repeat', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('password_repeat') )); ?>
        </div>

        <div class="pure-group">
            <h3><?php echo Yii::t('DefaultTheme.main', 'Change Your Email Address'); ?></h3>
            <?php echo $form->textField($model, 'email', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('email') )); ?>
            <p>
                <?php echo Yii::t('DefaultTheme.main', 'Awaiting activation for {{email}}. {{resend}}', array(
                    '{{email}}' => CHtml::tag('strong', array(), $model->getNewEmail()),
                    '{{resend}}' => CHtml::link(Yii::t('DefaultTheme.main', 'Resend?'), $this->createUrl('profile/resend'))
                )); ?>
            </p>
        </div>

        <div class="pure-group">
            <h3><?php echo Yii::t('DefaultTheme.main', 'Change Your Information'); ?></h3>
            <?php echo $form->textField($model, 'displayName', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('displayName') )); ?>
            <?php echo $form->textField($model, 'firstName', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('firstName') )); ?>
            <?php echo $form->textField($model, 'lastName', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('lastName') )); ?>
            <?php echo $form->textArea($model, 'about', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('about') )); ?>
        </div>


        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('DefaultTheme.main', 'Submit'); ?></button>
        <div class="clearfix"></div>

    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>

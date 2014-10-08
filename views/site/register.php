<div class="modal-container">
    <h2 class="pull-left"><?php echo Yii::t('DefaultTheme.main', 'Register an Account'); ?></h3>
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

    <?php if (!Yii::app()->user->isGuest): ?>
        <div class="alert alert-info">
            <?php echo Yii::t('DefaultTheme.main', "{{headsup}} Looks like you're already logged in as {{email}}", array(
                    '{{headsup}}' => CHtml::tag('strong', array(), Yii::t('DefaultTheme.main', 'Heads Up!')),
                    '{{email}}'   => CHtml::tag('strong', array(), Yii::app()->user->email),
                )); ?>
         </div>
    <?php else: ?>
         <?php echo $form->errorSummary($model); ?>

         <?php echo $form->textField($model, 'email', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('email') )); ?>
         <?php echo $form->textField($model, 'username', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('username') )); ?>
         <?php echo $form->passwordField($model, 'password', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('password'), 'id' => 'password' )); ?>

        <div id ="password_strength_1" class="password_strength_container">
            <div class="password_strength_bg"></div>
            <div class="password_strength" style="width: 0%;"></div>
            <div class="password_strength_separator" style="left: 25%;"></div>
            <div class="password_strength_separator" style="left: 50%;"></div>
            <div class="password_strength_separator" style="left: 75%;"></div>
            <div class="password_strength_desc"></div>
            <div class="clearfix"></div>
        </div>

        <?php echo $form->passwordField($model, 'password_repeat', array('class' => 'pure-u-1', 'placeholder' => $model->getAttributeLabel('password_repeat'), 'id' => 'password_repeat' )); ?>
        <div id ="password_strength_2" class="password_strength_container">
            <div class="password_strength_bg"></div>
            <div class="password_strength" style="width: 0%;"></div>
            <div class="password_strength_separator" style="left: 25%;"></div>
            <div class="password_strength_separator" style="left: 50%;"></div>
            <div class="password_strength_separator" style="left: 75%;"></div>
            <div class="password_strength_desc"></div>
            <div class="clearfix"></div>
        </div>


        <div class="pull-left">
            <?php echo CHtml::link(Yii::t('DefaultTheme.main', 'login'), $this->createUrl('/login')); ?>
            <span> | </span>
            <?php echo CHtml::link(Yii::t('DefaultTheme.main', 'forgot'), $this->createUrl('/forgot')); ?>
        </div>

        <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('DefaultTheme.main', 'Submit'); ?></button>
        <div class="clearfix"></div>
    <?php endif; ?>

    <!-- Social Icons -->
    <?php if (Yii::app()->user->isGuest): ?>
        <?php if (count(Cii::getHybridAuthProviders()) >= 1): ?>
        <div class="clearfix" style="border-bottom: 1px solid #aaa; margin: 15px;"></div>
            <span class="login-form-links"><?php echo Yii::t('DefaultTheme.main', 'Or register with one of these social networks'); ?></span>
        <?php endif; ?>
        <div class="clearfix"></div>
        <div class="social-buttons">
            <?php foreach (Cii::getHybridAuthProviders() as $k=>$v): ?>
                <?php if (Cii::get($v, 'enabled', false) == 1): ?>
                    <?php echo CHtml::link(NULL, $this->createUrl('/hybridauth/'.$k), array('class' => 'social-icons ' . strtolower($k))); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>

<?php Yii::app()->clientScript->registerScript('password_strength_meter', '$(document).ready(function() { Theme.loadRegister(); });', CClientScript::POS_END);

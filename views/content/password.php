<div class="modal-container">
    <h2><?php echo Yii::t('themes.default.main', 'This Post is Password Protected'); ?></h2>
    <hr />
    <?php $form=$this->beginWidget('cii.widgets.CiiActiveForm', array(
        'id'                                    => 'login-form',
        'focus'                                 => 'input[type="text"]:first',
        'registerPureCss'        => false,
        'enableAjaxValidation'  =>      true,
        'htmlOptions' => array(
            'class' => 'pure-form pure-form-stacked'
        )   
    )); ?>
        <?php if(Yii::app()->user->hasFlash('error')):?>
            <div class="alert alert-danger">
                <?php echo Yii::app()->user->getFlash('error'); ?>
            </div>
        <?php endif; ?>

            <?php echo CHtml::passwordField('password',  Cii::get($_POST, 'password', ''), array('class' => 'pure-u-1', 'placeholder'=>Yii::t('themes.default.main', 'Enter the password to view this entry'))); ?>
            <button type="submit" class="pull-right pure-button pure-button-primary"><?php echo Yii::t('themes.default.main', 'Submit'); ?></button>
            <div class="clearfix"></div>
    <?php $this->endWidget(); ?>
    <div class="clearfix"></div>
</div>

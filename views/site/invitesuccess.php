<div class="modal-container">
    <h2><?php echo Yii::t('themes.default.main', 'Thanks for Activating Your Account!'); ?></h2>
    <hr />
    <p class="pull-text-left"><?php echo Yii::t('themes.default.main', "You may now {{login}} and head to the {{dashboard}}", array(
        '{{login}}' => CHtml::link(Yii::t('themes.default.main', 'login'), $this->createUrl('/login')),
        '{{dashboard}}' => CHtml::link(Yii::t('themes.default.main', 'dashboard'), $this->createUrl('/dashboard'))
    )); ?></p>
</div>

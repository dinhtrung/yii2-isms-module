<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use vendor\dinhtrung\isms\models\Ftpsetting;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Filter $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="filter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $this->beginBlock('info')?>
	    <?= $form->field($model, 'title', [
	    			'options' => ['maxlength' => 255],
	    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
		]) ?>
	    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	<?php $this->endBlock(); ?>


    <?php $this->beginBlock('black')?>
	    <?= $form->field($model, 'refuse_syntax')->textarea() ?>
	    <?= $form->field($model, 'reply_refuse')->textarea() ?>
	    <?= $form->field($model, 'reply_refuse_dup')->textarea() ?>
	    <?= $form->field($model, 'ftpblack')->dropDownList(['' => '--- FTP Server ---'] + Ftpsetting::options()) ?>
	    <?= $form->field($model, 'ftpblackfile')->textInput(['maxlength' => 255]) ?>
	<?php $this->endBlock(); ?>


    <?php $this->beginBlock('white')?>
		<?= $form->field($model, 'accept_syntax')->textarea() ?>
	    <?= $form->field($model, 'reply_accept')->textarea() ?>
	    <?= $form->field($model, 'reply_accept_dup')->textarea() ?>
	    <?= $form->field($model, 'ftpwhite')->dropDownList(['' => '--- FTP Server ---'] + Ftpsetting::options()) ?>
	    <?= $form->field($model, 'ftpwhitefile')->textInput(['maxlength' => 255]) ?>
	<?php $this->endBlock(); ?>

	<?= \yii\bootstrap\Tabs::widget([
		'items' => [
			['label' => \Yii::t('isms', 'Information'), 'content' => "<br/>" . $this->blocks['info']],
			['label' => \Yii::t('isms', 'Blacklist'), 'content' => "<br/>" . $this->blocks['black']],
			['label' => \Yii::t('isms', 'Whitelist'), 'content' => "<br/>" . $this->blocks['white']],
    ] ] )?>

	<hr>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

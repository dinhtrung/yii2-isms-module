<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Datafile $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="datafile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title', [
				    			'options' => ['maxlength' => 255],
				    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
					]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'createtime')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'filesize')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'updatetime')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'uid')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'uri')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'filemime')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Ftpfilename $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ftpfilename-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cid')->textInput() ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

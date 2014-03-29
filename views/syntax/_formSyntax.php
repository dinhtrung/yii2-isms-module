<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Syntax $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="syntax-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fid')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'syntax')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

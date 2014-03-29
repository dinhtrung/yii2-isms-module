<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Worktime $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="worktime-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start')->textInput() ?>

    <?= $form->field($model, 'end')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

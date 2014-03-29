<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\EmailsettingSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="emailsetting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hostname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'option') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('isms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('isms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

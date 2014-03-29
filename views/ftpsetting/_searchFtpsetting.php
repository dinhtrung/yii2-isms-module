<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\FtpsettingSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ftpsetting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'hostname') ?>

    <?= $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'path') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('isms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('isms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

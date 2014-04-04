<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\DatafileSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="datafile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fid') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'createtime') ?>

    <?= $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'uri') ?>

    <?php // echo $form->field($model, 'filemime') ?>

    <?php // echo $form->field($model, 'filesize') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <?php // echo $form->field($model, 'uid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('isms', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('isms', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

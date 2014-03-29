<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Order $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title', [
				    			'options' => ['maxlength' => 255],
				    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
					]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'userid')->textInput() ?>

    <?= $form->field($model, 'createtime')->textInput() ?>

    <?= $form->field($model, 'updatetime')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'expired')->textInput() ?>

    <?= $form->field($model, 'smscount')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

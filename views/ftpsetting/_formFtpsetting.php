<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Ftpsetting $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ftpsetting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title', [
				    			'options' => ['maxlength' => 255],
				    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
					]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hostname')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 40]) ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

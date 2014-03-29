<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Filter $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="filter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ftpblack')->textInput() ?>

    <?= $form->field($model, 'ftpwhite')->textInput() ?>

    <?= $form->field($model, 'title', [
				    			'options' => ['maxlength' => 255],
				    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
					]) ?>

    <?= $form->field($model, 'reply_refuse')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'reply_accept')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'reply_false_syntax')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'description')->widget(kartik\markdown\MarkdownEditor::className(), ['height' => 300 ]) ?>

    <?= $form->field($model, 'reply_accept_dup')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'reply_refuse_dup')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'ftpblackfile')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'ftpwhitefile')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

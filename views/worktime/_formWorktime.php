<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Worktime $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="worktime-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
	    <div class="col-xs-3">
		    <?= $form->field($model, 'start')->widget(\kartik\widgets\TimePicker::className(), [
		        'pluginOptions' => [ 'minuteStep' => 1, 'showSeconds' => TRUE, 'showMeridian' => FALSE]
		    ]); ?>
	    </div>
	    <div class="col-xs-3">
		    <?= $form->field($model, 'end')->widget(\kartik\widgets\TimePicker::className(), [
		        'pluginOptions' => [ 'minuteStep' => 1, 'showSeconds' => TRUE, 'showMeridian' => FALSE]
		    ]); ?>
	    </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

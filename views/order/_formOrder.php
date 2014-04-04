<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use vendor\dinhtrung\isms\models\Order;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Order $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
	    <div class="col-xs-6">

    <?= $form->field($model, 'title', [
				    			'options' => ['maxlength' => 255],
				    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
					]) ?>

		    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

	    </div>
	    <div class="col-xs-6">
		    <?= $form->field($model, 'userid')->textInput() // @TODO: Complete after got the User model ?>

		    <div class="row">
			    <div class="col-md-6">

		    <?= $form->field($model, 'status')->dropDownList(Order::statusOptions()) ?>

		    	</div>
			    <div class="col-md-6">
		    <?= $form->field($model, 'expired')->widget(DatePicker::className(), [
		        'pluginOptions' => [ 'format' => 'yyyy-mm-dd', 'todayHighlight' => true ]
		    ]); ?>
			    </div>
		    </div>

		    <?= $form->field($model, 'smscount')->textInput(['maxlength' => 20]) ?>
	    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

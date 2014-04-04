<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use vendor\dinhtrung\isms\models\Worktime;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
use vendor\dinhtrung\isms\models\Campaign;
use kartik\widgets\FileInput;
use vendor\dinhtrung\isms\models\Organization;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Campaign $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

<?php $this->beginBlock('basic');?>

	<div class="row">
	    <div class="col-xs-9">
			<?= $form->field($model, 'title', [
		    			'options' => ['maxlength' => 255],
		    			'addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]
			]) ?>
	    </div>
	    <div class="col-xs-3">
			<?= $form->field($model, 'codename')->textInput(['maxlength' => 20, 'size' => 'small']) ?>
	    </div>
    </div>

    <div class="row">
	    <div class="col-xs-9">
			<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	    </div>
	    <div class="col-xs-3">
		    <?= $form->field($model, 'status')->textInput() ?>

		    <?= $form->field($model, 'approved')->textInput() ?>
	    </div>
    </div>

    <?= $form->field($model, 'orderid')->textInput() ?>

    <?= $form->field($model, 'org')->dropDownList(['' => '-- Select Site --'] + Organization::options()) ?>

    <?= $form->field($model, 'type')->textInput() ?>

<?php $this->endBlock();?>
<?php $this->beginBlock('setting');?>

	<?= $form->field($model, 'priority')->textInput() ?>

    <?= $form->field($model, 'velocity')->textInput() ?>

    <?= $form->field($model, 'throughput')->textInput() ?>

<?php $this->endBlock();?>

<?php $this->beginBlock('info');?>
	<div class="row">
	    <div class="col-xs-6">
			<?= $form->field($model, 'request_date')->widget(DatePicker::className(), [ 'pluginOptions' => [ 'format' => 'yyyy-mm-dd', 'todayHighlight' => true ] ]);?>

		    <?= $form->field($model, 'request_owner')->textInput(['maxlength' => 40]) ?>

		    <?= $form->field($model, 'datasender')->textInput(['maxlength' => 80]) ?>
	    </div>
	    <div class="col-xs-6">
			<?= $form->field($model, 'tosubscriber')->textarea(['rows' => 6]) ?>
	    </div>
    </div>
<?php $this->endBlock();?>

<?php $this->beginBlock('template');?>
	<div class="row">
	    <div class="col-xs-3">
			<?= $form->field($model, 'sender')->textInput(['maxlength' => 20]) ?>

			<?= $form->field($model, 'col')->textInput() ?>

		    <?= $form->field($model, 'isdncol')->textInput() ?>
	    </div>
	    <div class="col-xs-3">
		    <?= $form->field($model, 'emailbox')->textInput() ?>

		    <?= $form->field($model, 'esubject')->textInput(['maxlength' => 255]) ?>

		    <?= $form->field($model, 'eattachment')->textInput(['maxlength' => 255]) ?>
	    </div>
	    <div class="col-xs-6">
		    <?= $form->field($model, 'template')->textarea(['rows' => 6])->hint('SMS Content to send to user') ?>
	    </div>
    </div>



<?php $this->endBlock();?>


<?php $this->beginBlock('files');?>
	<?= $form->field($model, 'datafiles')->widget(FileInput::className(), [
	    'options' => ['multiple' => true],
	])?>

    <?= $form->field($model, 'ftpserver')->textInput() ?>
<?php $this->endBlock();?>

<?php $this->beginBlock('expiration');?>
	<div class="row">
	    <div class="col-xs-6">
			<?= $form->field($model, 'start')->widget(DateTimePicker::className(), [
			    'value' => date('Y-m-d H:i:s'),
			    'pluginOptions' => [
			        'format' => 'yyyy-mm-dd hh:ii:ss',
			        'todayHighlight' => true
			    ]
			]);?>
	    </div>
	    <div class="col-xs-6">
			<?= $form->field($model, 'end')->widget(DateTimePicker::className(), [
			    'value' => date('Y-m-d H:i:s'),
			    'pluginOptions' => [
			        'format' => 'yyyy-mm-dd hh:ii:ss',
			        'todayHighlight' => true
			    ]
			]);?>
	    </div>
    </div>

    	<div class="row">
	    <div class="col-xs-6">
		    <?= $form->field($model, 'cpworkday', ['options' => ['class' => 'inline']])->checkboxList(Campaign::cpweekdayOptions()) ?>
	    </div>
	    <div class="col-xs-6">
			<?= $form->field($model, 'cpworktime')->checkboxList(Worktime::options());
			    ?>
	    </div>
    </div>

<?php $this->endBlock();?>

    <?= Tabs::widget([
		'items' =>[
		 [
	          'label'		=>	Yii::t('isms', 'Basic'),
	          'content'	=> $this->blocks['basic']
			],
	     [
	          'label'	=>	Yii::t('isms', 'Information'),
	          'content'	=> $this->blocks['info']
		],
	     [
	          'label'	=>	Yii::t('isms', 'Configuration'),
	          'content'	=> $this->blocks['setting']
		],
	     [
	          'label'	=>	Yii::t('isms', 'SMS Template'),
	          'content'	=> $this->blocks['template']
		],
	     [
	          'label'	=>	Yii::t('isms', 'Files'),
	          'content'	=> $this->blocks['files'],
	    ],
		[
		          'label'	=>	Yii::t('isms', 'Expiration'),
		          'content'	=> $this->blocks['expiration']
		],
	] ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('isms', 'Create') : Yii::t('isms', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>


</div>

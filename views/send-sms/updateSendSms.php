<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\SendSms $model
 */

$this->title = Yii::t('isms', 'Update {modelClass}: ', [
  'modelClass' => 'Send Sms',
]) . $model->receiver;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Send Sms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->receiver, 'url' => ['view', 'receiver' => $model->receiver, 'campaign_id' => $model->campaign_id]];
$this->params['breadcrumbs'][] = Yii::t('isms', 'Update');
?>
<div class="send-sms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSendSms', [
        'model' => $model,
    ]) ?>

</div>

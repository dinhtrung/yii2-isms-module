<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\SendSms $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Send Sms',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Send Sms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="send-sms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSendSms', [
        'model' => $model,
    ]) ?>

</div>

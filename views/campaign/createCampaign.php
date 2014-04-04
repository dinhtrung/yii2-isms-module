<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Campaign $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Campaign',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Campaigns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCampaign', [
        'model' => $model,
    ]) ?>

</div>

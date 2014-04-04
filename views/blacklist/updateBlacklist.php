<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Blacklist $model
 */

$this->title = Yii::t('isms', 'Update {modelClass}: ', [
  'modelClass' => 'Blacklist',
]) . $model->fid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Blacklists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fid, 'url' => ['view', 'fid' => $model->fid, 'isdn' => $model->isdn]];
$this->params['breadcrumbs'][] = Yii::t('isms', 'Update');
?>
<div class="blacklist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formBlacklist', [
        'model' => $model,
    ]) ?>

</div>

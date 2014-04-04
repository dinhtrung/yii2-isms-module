<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Datafile $model
 */

$this->title = Yii::t('isms', 'Update {modelClass}: ', [
  'modelClass' => 'Datafile',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Datafiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->fid]];
$this->params['breadcrumbs'][] = Yii::t('isms', 'Update');
?>
<div class="datafile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formDatafile', [
        'model' => $model,
    ]) ?>

</div>

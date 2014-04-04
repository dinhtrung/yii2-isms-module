<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Worktime $model
 */

$this->title = Yii::t('isms', 'Update {modelClass}: ', [
  'modelClass' => 'Worktime',
]) . $model->start . ' - ' . $model->end;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Worktimes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('isms', 'Update');
?>
<div class="worktime-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formWorktime', [
        'model' => $model,
    ]) ?>

</div>

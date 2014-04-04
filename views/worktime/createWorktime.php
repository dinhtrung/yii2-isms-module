<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Worktime $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Worktime',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Worktimes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worktime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formWorktime', [
        'model' => $model,
    ]) ?>

</div>

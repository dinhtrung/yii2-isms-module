<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Filter $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Filter',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Filters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formFilter', [
        'model' => $model,
    ]) ?>

</div>

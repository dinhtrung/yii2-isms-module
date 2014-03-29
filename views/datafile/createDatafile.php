<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Datafile $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Datafile',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Datafiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datafile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formDatafile', [
        'model' => $model,
    ]) ?>

</div>

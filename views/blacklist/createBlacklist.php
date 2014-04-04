<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Blacklist $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Blacklist',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Blacklists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formBlacklist', [
        'model' => $model,
    ]) ?>

</div>

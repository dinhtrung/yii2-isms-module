<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Whitelist $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Whitelist',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Whitelists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="whitelist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formWhitelist', [
        'model' => $model,
    ]) ?>

</div>

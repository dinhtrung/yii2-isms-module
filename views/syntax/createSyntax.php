<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Syntax $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Syntax',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Syntaxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syntax-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSyntax', [
        'model' => $model,
    ]) ?>

</div>

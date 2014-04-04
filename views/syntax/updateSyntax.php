<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Syntax $model
 */

$this->title = Yii::t('isms', 'Update {modelClass}: ', [
  'modelClass' => 'Syntax',
]) . $model->fid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Syntaxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fid, 'url' => ['view', 'fid' => $model->fid, 'syntax' => $model->syntax]];
$this->params['breadcrumbs'][] = Yii::t('isms', 'Update');
?>
<div class="syntax-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSyntax', [
        'model' => $model,
    ]) ?>

</div>

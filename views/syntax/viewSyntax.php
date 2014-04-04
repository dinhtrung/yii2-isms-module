<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Syntax $model
 */

$this->title = $model->fid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Syntaxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="syntax-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('isms', 'Update'), ['update', 'fid' => $model->fid, 'syntax' => $model->syntax], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('isms', 'Delete'), ['delete', 'fid' => $model->fid, 'syntax' => $model->syntax], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('isms', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fid',
            'syntax',
            'type',
        ],
    ]) ?>

</div>

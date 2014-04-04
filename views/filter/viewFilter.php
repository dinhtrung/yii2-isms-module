<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Filter $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Filters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-view">

    <h1><small><?= Yii::t('isms', 'Filter'); ?>:</small> <?= Html::encode($this->title) ?></h1>

    <p class="well"><?= $model->description?></p>
    <p>
        <?= Html::a(Yii::t('isms', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('isms', 'Delete'), ['delete', 'id' => $model->id], [
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
            'reply_refuse',
            'reply_accept',
            'reply_false_syntax',
            'ftpblack',
            'ftpblackfile',
            'ftpwhite',
            'ftpwhitefile',
            'reply_accept_dup',
            'reply_refuse_dup',
        ],
    ]) ?>

</div>

<hr>
<h3><?= \Yii::t('isms', 'Blacklist')?></h3>
<?= GridView::widget([
		'id' => 'blacklist-' . $model->id,
        'dataProvider' => $dataProvider['blacklist'],
        'filterModel' => $searchModel['blacklist'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'isdn',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<h3><?= \Yii::t('isms', 'Whitelist')?></h3>
<?= GridView::widget([
		'id' => 'whitelist-' . $model->id,
        'dataProvider' => $dataProvider['whitelist'],
        'filterModel' => $searchModel['whitelist'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'isdn',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

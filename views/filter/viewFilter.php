<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Filter $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Filters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-view">

    <h1><small><?= Yii::t('isms', 'Filter'); ?>:</small> <?= Html::encode($this->title) ?></h1>

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
            'description',
            'ftpblack',
            'ftpblackfile',
            'ftpwhite',
            'ftpwhitefile',
            'reply_accept_dup',
            'reply_refuse_dup',
        ],
    ]) ?>

</div>

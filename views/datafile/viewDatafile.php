<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Datafile $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Datafiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datafile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('isms', 'Update'), ['update', 'id' => $model->fid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('isms', 'Delete'), ['delete', 'id' => $model->fid], [
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
            'title',
            'description:ntext',
            'createtime',
            'filename',
            'uri',
            'filemime',
            'filesize',
            'status',
            'updatetime',
            'uid',
        ],
    ]) ?>

</div>

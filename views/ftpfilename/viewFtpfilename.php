<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Ftpfilename $model
 */

$this->title = $model->cid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Ftpfilenames'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftpfilename-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('isms', 'Update'), ['update', 'cid' => $model->cid, 'filename' => $model->filename], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('isms', 'Delete'), ['delete', 'cid' => $model->cid, 'filename' => $model->filename], [
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
            'cid',
            'filename',
            'status',
        ],
    ]) ?>

</div>

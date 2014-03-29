<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Blacklist $model
 */

$this->title = $model->fid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Blacklists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('isms', 'Update'), ['update', 'fid' => $model->fid, 'isdn' => $model->isdn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('isms', 'Delete'), ['delete', 'fid' => $model->fid, 'isdn' => $model->isdn], [
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
            'isdn',
        ],
    ]) ?>

</div>

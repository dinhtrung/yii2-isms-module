<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var dinhtrung\isms\models\Ftpsetting $model
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Ftpsettings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftpsetting-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'title',
            'description:ntext',
            'hostname',
            'username',
            'password',
            'path',
        ],
    ]) ?>

</div>

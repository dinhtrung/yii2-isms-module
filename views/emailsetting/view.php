<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Emailsetting $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Emailsettings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emailsetting-view">

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
            'hostname',
            'email:email',
            'password',
            'option',
        ],
    ]) ?>

</div>

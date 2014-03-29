<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="organization-view">

    <h1><small><?= \Yii::t('app', 'Organization'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
        ],
    ]) ?>

</div>

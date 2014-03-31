<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
?>
<div class="whitelist-view">

    <h1><small><?= \Yii::t('app', 'Whitelist'); ?>:</small> <?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fid',
            'isdn',
        ],
    ]) ?>

</div>

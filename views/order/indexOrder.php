<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dinhtrung\isms\models\Order;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var dinhtrung\isms\models\OrderSearch $searchModel
 */

$this->title = Yii::t('isms', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Order',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
//             'userid',
            'createtime:datetime',
            // 'updatetime:datetime',
            ['attribute' => 'status', 'filter' => Order::statusOptions(), 'format' => 'html',
				'value' => function($data){ return Order::statusOptions($data->status); },
			],
            // 'expired',
            // 'smscount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

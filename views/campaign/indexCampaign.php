<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var vendor\dinhtrung\isms\models\CampaignSearch $searchModel
 */

$this->title = Yii::t('isms', 'Campaigns');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Campaign',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'title', 'value' => function($data){ return "<strong>" . Html::a($data->title, ['view', 'id' => $data->id]) . "</strong><br/><small>" .$data->description .  "</small><br/><p class='text-muted'>" . $data->template . "</p>"; }, 'format' => 'html'],
//             'description:ntext',
//             'createtime:datetime',
//             'updatetime:datetime',
            // 'codename',
            // 'request_date',
            // 'request_owner',
            // 'datasender',
            // 'tosubscriber:ntext',
            ['attribute' => 'start', 'label' => 'Time', 'value' => function($data){ return "<span class='label label-primary'>" . $data->start . "</span> <span class='label label-success'>" .$data->end .  "</span>"; }, 'format' => 'html'],
//             'start',
//             'end',
            ['attribute' => 'status', 'label' => 'Status', 'value' => function($data){
    				return "<span class='label label-primary'>" . $data->status . "</span>
								<span class='label label-success'>" .$data->approved .  "</span>
								<span class='label label-warning'>" .$data->ready .  "</span>
								<span class='label label-danger'>" .$data->finished .  "</span>
            					<span class='label label-default'>" .$data->active .  "</span>";
    			}, 'format' => 'html'],
//             'status',
//             'finished',
//             'approved',
            // 'active',
            // 'sender',
            // 'ready',
            // 'org',
            // 'type',
            // 'throughput',
            // 'col',
            // 'isdncol',
//             'template:ntext',
            // 'priority',
            // 'velocity',
            // 'cpworkday',
            // 'emailbox:email',
            // 'esubject',
            // 'eattachment',
            // 'ftpserver',
            // 'smsimport',
            // 'blockimport',
            // 'limit_exceeded',
            // 'send',
            // 'blocksend',
            // 'sent',
            // 'blocksent',
            // 'orderid',
            // 'exported',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

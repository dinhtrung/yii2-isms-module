<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var dinhtrung\isms\models\DatafileSearch $searchModel
 */

$this->title = Yii::t('isms', 'Datafiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datafile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Datafile',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            'createtime:datetime',
            'filename',
            // 'uri',
            // 'filemime',
            // 'filesize',
            // 'status',
            // 'updatetime',
            // 'uid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

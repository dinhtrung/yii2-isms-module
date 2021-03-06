<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var dinhtrung\isms\models\FilterSearch $searchModel
 */

$this->title = Yii::t('isms', 'Filters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Filter',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'reply_refuse',
            'reply_accept',
            'reply_false_syntax',
            // 'description',
            // 'ftpblack',
            // 'ftpblackfile',
            // 'ftpwhite',
            // 'ftpwhitefile',
            // 'reply_accept_dup',
            // 'reply_refuse_dup',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

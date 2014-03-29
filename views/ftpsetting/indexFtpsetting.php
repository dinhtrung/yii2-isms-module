<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var vendor\dinhtrung\isms\models\FtpsettingSearch $searchModel
 */

$this->title = Yii::t('isms', 'Ftpsettings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftpsetting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Ftpsetting',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'description:ntext',
            'hostname',
            'username',
            'password',
            'path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

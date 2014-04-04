<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var dinhtrung\isms\models\EmailsettingSearch $searchModel
 */

$this->title = Yii::t('isms', 'Emailsettings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emailsetting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Emailsetting',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hostname',
            'email:email',
            'password',
            'option',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

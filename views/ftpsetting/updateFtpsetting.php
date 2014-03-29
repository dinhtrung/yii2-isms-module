<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Ftpsetting $model
 */

$this->title = Yii::t('isms', 'Update {modelClass}: ', [
  'modelClass' => 'Ftpsetting',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Ftpsettings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('isms', 'Update');
?>
<div class="ftpsetting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formFtpsetting', [
        'model' => $model,
    ]) ?>

</div>

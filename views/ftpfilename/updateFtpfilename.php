<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Ftpfilename $model
 */

$this->title = Yii::t('isms', 'Update {modelClass}: ', [
  'modelClass' => 'Ftpfilename',
]) . $model->cid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Ftpfilenames'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cid, 'url' => ['view', 'cid' => $model->cid, 'filename' => $model->filename]];
$this->params['breadcrumbs'][] = Yii::t('isms', 'Update');
?>
<div class="ftpfilename-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formFtpfilename', [
        'model' => $model,
    ]) ?>

</div>

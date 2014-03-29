<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Ftpfilename $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Ftpfilename',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Ftpfilenames'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftpfilename-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formFtpfilename', [
        'model' => $model,
    ]) ?>

</div>

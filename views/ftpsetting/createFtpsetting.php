<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Ftpsetting $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Ftpsetting',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Ftpsettings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftpsetting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formFtpsetting', [
        'model' => $model,
    ]) ?>

</div>

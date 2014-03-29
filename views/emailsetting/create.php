<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Emailsetting $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Emailsetting',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Emailsettings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emailsetting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

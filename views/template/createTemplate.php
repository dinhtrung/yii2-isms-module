<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var vendor\dinhtrung\isms\models\Template $model
 */

$this->title = Yii::t('isms', 'Create {modelClass}', [
  'modelClass' => 'Template',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('isms', 'Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formTemplate', [
        'model' => $model,
    ]) ?>

</div>

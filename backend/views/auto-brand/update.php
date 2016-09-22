<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AutoBrand */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Auto Brand',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auto-brand-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

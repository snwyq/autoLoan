<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AutoSeries */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Auto Series',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Series'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auto-series-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

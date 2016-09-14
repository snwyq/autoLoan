<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductClass */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product Class',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Classes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-class-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

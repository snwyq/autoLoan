<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMoneyChannelProduct */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product Money Channel Product',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Money Channel Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-money-channel-product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

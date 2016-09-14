<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMoneyChannel */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product Money Channel',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Money Channels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-money-channel-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

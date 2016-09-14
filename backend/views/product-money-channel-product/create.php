<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductMoneyChannelProduct */

$this->title = Yii::t('app', 'Create Product Money Channel Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Money Channel Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-money-channel-product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

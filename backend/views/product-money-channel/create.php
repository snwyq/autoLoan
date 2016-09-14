<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductMoneyChannel */

$this->title = Yii::t('app', 'Create Product Money Channel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Money Channels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-money-channel-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

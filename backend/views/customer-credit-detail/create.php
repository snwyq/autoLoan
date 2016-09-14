<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditDetail */

$this->title = Yii::t('app', 'Create Customer Credit Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-credit-detail-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

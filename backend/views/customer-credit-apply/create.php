<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditApply */

$this->title = Yii::t('app', 'Create Customer Credit Apply');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Applies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-credit-apply-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

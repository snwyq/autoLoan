<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansPayPlan */

$this->title = Yii::t('app', 'Create Loan Makeloans Pay Plan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Pay Plans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-makeloans-pay-plan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

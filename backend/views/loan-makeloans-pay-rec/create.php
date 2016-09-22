<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansPayRec */

$this->title = Yii::t('app', 'Create Loan Makeloans Pay Rec');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Pay Recs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-makeloans-pay-rec-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

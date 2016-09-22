<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansPayRec */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Loan Makeloans Pay Rec',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Pay Recs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="loan-makeloans-pay-rec-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

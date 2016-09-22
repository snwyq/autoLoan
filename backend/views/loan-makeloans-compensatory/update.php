<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansCompensatory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Loan Makeloans Compensatory',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Compensatories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="loan-makeloans-compensatory-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

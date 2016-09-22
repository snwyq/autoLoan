<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansCompensatory */

$this->title = Yii::t('app', 'Create Loan Makeloans Compensatory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Compensatories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-makeloans-compensatory-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloans */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Loan Makeloans',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="loan-makeloans-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

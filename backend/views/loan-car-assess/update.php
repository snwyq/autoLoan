<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssess */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Loan Car Assess',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Assesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="loan-car-assess-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

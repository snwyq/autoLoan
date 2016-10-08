<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssessControl */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Loan Car Assess Control',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Assess Controls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="loan-car-assess-control-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

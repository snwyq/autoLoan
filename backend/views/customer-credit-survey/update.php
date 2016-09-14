<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditSurvey */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Customer Credit Survey',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="customer-credit-survey-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

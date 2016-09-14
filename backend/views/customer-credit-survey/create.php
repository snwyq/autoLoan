<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditSurvey */

$this->title = Yii::t('app', 'Create Customer Credit Survey');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-credit-survey-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

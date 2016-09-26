<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanCar */

$this->title = Yii::t('app', 'Create Loan Car');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-car-create">

    <?= $this->render('_form', [
        'model' => $model,
        'assessmodel'=>$assessmodel
    ]) ?>

</div>

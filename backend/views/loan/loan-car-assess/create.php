<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssess */

$this->title = Yii::t('app', 'Create Loan Car Assess');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Assesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-car-assess-create">

    <?= $this->render('_form', [
        'model' => $model,
        'assessmodel'=>$assessmodel,
    ]) ?>

</div>

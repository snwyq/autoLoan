<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanCarCheck */

$this->title = Yii::t('app', 'Create Loan Car Check');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Checks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-car-check-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

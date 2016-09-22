<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloans */

$this->title = Yii::t('app', 'Create Loan Makeloans');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-makeloans-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

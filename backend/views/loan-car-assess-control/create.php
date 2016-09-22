<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssessControl */

$this->title = Yii::t('app', 'Create Loan Car Assess Control');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Assess Controls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-car-assess-control-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarChange */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Loan Car Change',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Changes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="loan-car-change-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

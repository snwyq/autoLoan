<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Loan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Loan',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="loan-update">

    <?= $this->render('_form', [
        'model' => $model,
        'assessmodel'=>$assessmoddel,
    ]) ?>

</div>

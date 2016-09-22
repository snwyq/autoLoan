<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarCheck */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Checks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'loan_id',
            'car_id',
            'check_class_id',
            'check_type_id',
            'plan_check_manager_by',
            'plan_check_time:datetime',
            'check_by_id',
            'check_result',
            'check_time:datetime',
            'check_description',
            'check_longitude',
            'check_latitude',
            'audit_status',
            'audit_by',
            'audit_description:ntext',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

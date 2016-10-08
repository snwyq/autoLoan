<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarChange */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Changes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'change_no',
            'loan_id',
            'customer_id',
            'car_id',
            'car_audit_money',
            'min_change_money',
            'car_id_new',
            'apply_time:datetime',
            'manager_id',
            'remark',
            'audit_at',
            'audit_by',
            'status',
            'order',
            'created_at',
            'updated_at',
            'created_by',
        ],
    ]) ?>
    </div>
</div>

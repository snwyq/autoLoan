<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansCompensatory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Compensatories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'loan_id',
            'makeloans_id',
            'pay_plan_id',
            'money_back_time:datetime',
            'money_end_time:datetime',
            'money_back_money',
            'overdue_days',
            'overdue_prit',
            'overdue_inst',
            'overdue_penalty',
            'is_repayment',
            'type',
            'remark:ntext',
            'order',
            'status',
            'created_by',
            'updated_at',
            'created_at',
        ],
    ]) ?>
    </div>
</div>

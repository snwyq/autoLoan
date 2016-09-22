<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansPayRec */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Pay Recs'), 'url' => ['index']];
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
            'plan_id',
            'makeloans_id',
            'money_back_time:datetime',
            'money_back_money',
            'real_money_back_time:datetime',
            'real_money_back_money',
            'change_money',
            'fine_money',
            'is_repayment',
            'remark:ntext',
            'order',
            'status',
            'created_at',
            'updated_at',
            'pos_withhold',
            'money_back_type',
            'audit_by',
            'audit_at',
            'type',
        ],
    ]) ?>
    </div>
</div>

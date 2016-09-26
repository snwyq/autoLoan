<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Loan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'loan_no',
                'customer_id',
                'company_id',
                'province_id',
                'city_id',
                'area_id',
                'apply_time:datetime',
                'manager_id',
                'money_channel_id',
                'money_channel_product_id',
                'loan_period_id',
                'pay_type_id',
                'apply_money',
                'audit_money',
                'loan_money_rate',
                'loan_money_rate_add',
                'audit_at',
                'audit_by',
                'loan_use_to',
                'source_repayment',
                'money_in_account',
                'money_in_account_name',
                'money_in_bank',
                'money_in_bank_branch',
                'loan_back_time:datetime',
                'money_back_account',
                'money_back_account_name',
                'money_back_bank',
                'money_back_bank_branch',

                'loan_back_status',
                'loan_back_by',
                'status',
                'audit_remark:ntext',
                'order',
                'created_at',
                'updated_at',
                'created_by',
                'remark',
            ],
            'template' => '<div class="col-sm-6"><div class="form-group"><label class="col-sm-3 control-label">{label}</label><div class="col-sm-8">
                                <p class="form-control-static">{value}</p></div></div></div>',
            'options' => ['class' => 'table table-striped table-bordered detail-view'],
        ]) ?>
    </div>
</div>

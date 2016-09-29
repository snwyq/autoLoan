<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Loan */

$this->title = "汽车评估" . "--- 合同编号：" . $model->loan_no;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '待评估列表'), 'url' => ['loan/car-assess-index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-primary">
    <div class="box-header">
        <h4>借款详情</h4>
    </div>

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


<div class="box box-primary">

    <div class="box-header">

        <div class="col-md-2"><h4>已评估车辆列表</h4></div>
        <div class="col-md-7">
            <h4>

                <small>借款额:&nbsp;&nbsp;&nbsp;</small><?= $model->audit_money ?>元
                <small>已评估总价:&nbsp;&nbsp;&nbsp;</small> <?= $summoney ?> 元
                <small>还需要评估:&nbsp;&nbsp;&nbsp;</small> <?= ($summoney - $model->audit_money) ?>元

            </h4>
        </div>
        <div class="col-md-3">

            <?php if (($summoney - $model->audit_money) > 0 && $model->status == 3) : ?>

                <?php echo Html::a('提交总部审核车辆',
                    ['change-status'],
                    [
                        'data-ajax' => 1,
                        'data-method' => 'post',
                        'data-params' => ['id' => $model->id, 'to' => 4],
                        'data-confirm' => '您确定提交总部核价？',
                        'class' => 'btn btn-info',
                    ]
                );
                ?>

            <?php endif; ?>

            <?php if ($model->status == 3) : ?>
                <?php echo Html::a('增加评估车辆', ['loan-car-assess/create', 'loan_id' => $model->id], ['class' => 'btn btn-success']) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="box-body">


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'loan_id',
                //'customer_id',
                // 'car_brand_id',
                [
                    'attribute' => 'car_brand_id',
                    'value' => function ($model) {
                        return \common\models\AutoBrand::getBrand()[$model->car_brand_id] .
                        \common\models\AutoSeries::getAutoSeries()[$model->car_series_id] .
                        \common\models\AutoModel::getAutoModel()[$model->car_model_id];
                    }
                ],
//                'car_series_id',
//                'car_model_id',
                'car_displacement',
                'car_vin',
                'assess.loan_id',
                'assess.assess_money',
                'assess.assess_loan_money',
                'assess.audit_loan_money:text:审核放款额',
                'assess.audit_at:date',

                // 'car_outprice',
                // 'car_start_time:datetime',
                // 'car_out_time:datetime',
                // 'car_color',
                // 'car_interior_color',
                // 'order',

                // 'status',
                'created_at:date',
                // 'updated_at',
                // 'emission_standard',

                [
                    'class' => 'backend\widgets\grid\ActionColumn',
                    'controller' => 'loan-car-assess',
                ],
            ],
        ]); ?>
    </div>


</div>

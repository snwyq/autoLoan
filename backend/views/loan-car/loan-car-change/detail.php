<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
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

<div class="box box-primary">

    <div class="box-header">

        <div class="col-md-2"><h4>已评估车辆列表</h4></div>
        <div class="col-md-7">
            <h4>

                <small>借款额:&nbsp;&nbsp;&nbsp;</small><?= $model->min_change_money ?>元
                <small>已评估总价:&nbsp;&nbsp;&nbsp;</small> <?= !is_null($summoney)?:0 ?> 元
                <small>还需要评估:&nbsp;&nbsp;&nbsp;</small> <?= ($summoney - $model->min_change_money) ?>元

            </h4>
        </div>
        <div class="col-md-3">

            <?php if (($summoney - $model->min_change_money) > 0 && $model->status == 3) : ?>

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
                <?php echo Html::a('增加置换评估车辆', ['loan-car-assess/create', 'loan_id' => $model->loan_id,'change_id'=>$model->id], ['class' => 'btn btn-success']) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="box-body">


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'id',
                'loan_id',
                'change_id',
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
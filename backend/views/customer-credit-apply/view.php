<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditApply */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Applies'), 'url' => ['customer-credit-apply/credit-add-list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
        <div class="col-lg-12 col-md-12">


            <div class="box-header col-md-6 ">
                <h4> 授信审请 </h4>
            </div>

            <div class="col-md-6">
                <?php

                if ($model->status == 3) {

                    echo Html::a('初审通过',
                        ['audit-ok'],
                        [
                            'data-ajax' => 1,
                            'data-method' => 'post',
                            'data-params' => ['id' => $model->id],
                            'data-confirm' => '您确定初审通过 ？',
                            'class' => 'btn btn-success pull-right',
                        ]
                    );

                    echo Html::a('返回补充材料',
                        ['auditback'],
                        ['data-toggle' => 'modal',
                            'data-target' => '#auditback',
                            'class' => 'btn btn-danger pull-right',
                        ]
                    );


                }

                if ($model->status == 4) {
                    echo Html::a('否决', ['firstauditOk', $model->id], ['class' => 'btn btn-success pull-right']);
                    echo Html::a('填写授信结论', ['customer-credit-detail/create', $model->id], ['class' => 'btn btn-info pull-right']);
                    echo Html::a('填写尽调报告', ['customer-credit-survey/create', 'id' => $model->id], ['class' => 'btn btn-info pull-right']);
                }


                ?>
            </div>
        </div>


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'customer_id',
                'apply_no',
                'province_id',
                'city_id',
                'area_id',
                'apply_time:datetime',
                'apply_manager_id',
                'customer_class',
                'apply_type_id',
                'old_credit_money',
                'to_credit_money',
                'money_channel_id',
                'apply_money',
                'audit_money',
                'audit_rate',
                'description:ntext',
                'status',
                'status_remark:ntext',
                'order',
                'created_at:datetime',
                'updated_at:datetime',
                'company_id',
            ],
        ]) ?>

    </div>

</div>

<!-- 弹出否决输入框 -->

<?php Modal::begin(['id' => 'auditback']); ?>

<p>
<div class="box-body">
    <?php $form = ActiveForm::begin(['action' => ['audit-back', 'id' => $model->id], 'method' => 'post']); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'status_remark')->textarea(['maxlength' => true, 'rows' => 15]) ?>

    <?= $form->field($model, 'apply_no')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', '确定'),
            [
//                'href'=>'audit-back&id='.$model->id,
//                'data-ajax' => 1,
//                'data-method' => 'post',
                'class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block'
            ]) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
</p>


<?php Modal::end(); ?>


<div class="box box-primary">

    <div class="box-header col-md-6">
        <h4> 授信结果 </h4>
    </div>

    <div class="box-header col-md-6">
        <?php

        if ($model->status == 4 || $model->status == 10) {
            echo Html::a('增加授信结论', ['customer-credit-detail/create', $model->id], ['class' => 'btn btn-info pull-right']);
        }
        ?>

    </div>


    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $creditDetail,
//            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'customerName.name',
                'productChannelName.name',
                'credit_money',

                ['attribute' => 'credit_money', 'content' => function ($model, $key, $index) {
                    return Html::a($model->credit_money, ['customer-credit-detail/view', 'id' => $model->id]);
                }, 'format' => 'raw'],

                'credit_money',
                'product_class_main_money',
                'product_class_part_money',
                'directional_credit_money',
//                 'immediately_credit_money',
//                 'single_credit_money',
//                 'credit_rating',
                'supervision_mode',
                'credit_period',
//                 'combination_rate',
//                 'inter_loan_limit',
                'start_time:date',
                'end_time:date',
//                 'condition:ntext',
//                 'description:ntext',
//                 'order',
//                 'status',
                'created_at',
//                 'updated_at',
//                 'created_by',

            ],
        ]); ?>

    </div>


</div>


<div class="box box-primary">
    <div class="box-header">
        <h4> 尽调报告 </h4>
    </div>
    <div class="box-body">

        <?= DetailView::widget([
            'model' => $creditSurvey,
            'attributes' => [
                'id',
                'apply_id',
                'suvey_by',
                'customer_id',
                'oldcustomer_flag',
                'overdue_flag',
                'card_address',
                'live_desp',
                'auto_work_year_id',
                'family_net_assets',
                'total_liabilities',
                'from_other_biz_money',
                'month_sales_amount',
                'month_stock_num',
                'growth_in_sales',
                'sales_profit',
                'turnover_days',
                'turnover_days_min',
                'forecasts_growth',
                'credit_desp:ntext',
                'biz_desp:ntext',
                'financing_purpose:ntext',
                'other_purpose:ntext',
                'investigation:ntext',
                'is_Lease_contract_flag',
                'industry_experience_flag',
                'second_hand_car_experience_flag',
                'bad_credit_flag',
                'cars_stop_number',
                'remark',
                'order',
                'status',
                'created_at',
                'updated_at',
            ],
        ]) ?>

    </div>


</div>


<div class="box box-primary">

    <div class="box-header">
        <h4> 授信处理日志 </h4>
    </div>
    <div class="box-body">

        <?= GridView::widget([
            'dataProvider' => $creditProcessHis,
            'columns' => [
                'id',
                'apply_id',
                'manager_id',
                'result_id',
                'remark:ntext',
                'create_time:datetime',
                'update_time:datetime',
                // 'status',
                // 'order',

                ['class' => 'backend\widgets\grid\ActionColumn'],
            ],
        ]); ?>

    </div>


</div>

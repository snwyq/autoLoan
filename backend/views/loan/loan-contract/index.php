<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Loan;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loans');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>

<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">贷款搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>


<div class="nav-tabs-custom" style="margin: 0">
    <ul class="nav nav-pills">
        <?php foreach ($status as $k => $g): ?>
            <?php if($k==8 ||$k==7) :?>
                <li  <?php if ($k == (empty($_REQUEST['status']) ? '7' : $_REQUEST['status'])): ?> class="active"<?php endif; ?>><?= \common\helpers\Html::a($g, ['', 'status' => $k]) ?></li>
            <?php endif ; ?>
        <?php endforeach; ?>
    </ul>
</div>
<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //  'filterModel' => $searchModel,
            'columns' => [
                'id',
                'loan_no',
                'customer.name',
                //  'company_id',
                //'province_id',
                // 'city_id',
                // 'area_id',
                // 'apply_time:datetime',
                // 'manager_id',
                // 'money_channel_id',
                //'money_channel_product_id',
                'moneyProduct.name',
                [
                    'attribute' => 'loan_period_id',
                    'value' => function ($model) {
                        return Yii::$app->config->get('LOAN_PERIRD_LIST')[$model->loan_period_id];
                    },
                    'format' => 'raw',
                ],

                [
                    'attribute' => 'pay_type_id',
                    'value' => function ($model) {
                        return Yii::$app->config->get('LOAN_REPAY_TYPE')[$model->pay_type_id];
                    },
                    'format' => 'raw',
                ],


                'apply_money',
                // 'audit_money',
                // 'loan_money_rate',
                // 'loan_money_rate_add',
                // 'audit_at',
                // 'audit_by',
                // 'loan_use_to',
                // 'source_repayment',
                // 'money_in_account',
                // 'money_in_account_name',
                // 'money_in_bank',
                // 'money_in_bank_branch',
                // 'loan_back_time:datetime',
                // 'money_back_account',
                // 'money_back_account_name',
                // 'money_back_bank',
                // 'money_back_bank_branch',
                // 'remark',
                // 'loan_back_status',
                // 'loan_back_by',
                [

                    'attribute' => 'status',
                    'value' => function ($model) {
                        return  Html::a($model->getLoanStatus()[$model->status],['loan-car-assess-detail','id'=>$model->id]);
                    },
                    'format' => 'raw',

                ],
                // 'audit_remark:ntext',
                // 'order',
                // 'created_at',
                // 'updated_at',
                // 'created_by',
//                [
//                    'class' => 'backend\widgets\grid\ActionColumn',
//                    'template' => '{changestatus} ',
//                    'buttons' => [
//                        'changestatus' => function ($url, $model, $key) {
//
//                            if($model->status!=10 &&  $model->status!=-10) {
//                                $txt = Loan::getLoanNextStatus()[$model->status][1];
//                                $toStatus = Loan::getLoanNextStatus()[$model->status][2];
//                            }
//                            else
//                            {
//                                return false;
//                            }
//
//                            return Html::a($txt,
//                                ['change-status'],
//                                [
//                                    'data-ajax' => 1,
//                                    'data-method' => 'post',
//                                    'data-params' => ['id' => $model->id, 'to' => $toStatus],
//                                    'data-confirm' => '您确定提交总部核价？',
//                                    // 'class' => 'btn btn-success pull-right',
//                                ]
//                            );
//
//                        },
//
//                    ]
//                ],


//                ['class' => 'backend\widgets\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>




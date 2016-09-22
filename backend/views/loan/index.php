<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loans');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'loan_no',
                    'customer_id',
                    'company_id',
                    'province_id',
                    // 'city_id',
                    // 'area_id',
                    // 'apply_time:datetime',
                    // 'manager_id',
                    // 'money_channel_id',
                    // 'money_channel_product_id',
                    // 'loan_period_id',
                    // 'pay_type_id',
                    // 'apply_money',
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
                    // 'status',
                    // 'audit_remark:ntext',
                    // 'order',
                    // 'created_at',
                    // 'updated_at',
                    // 'created_by',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

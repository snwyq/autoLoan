<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CustomerCreditSurveySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customer Credit Surveys');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Customer Credit Survey'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'apply_id',
                    'suvey_by',
                    'customer_id',
                    'oldcustomer_flag',
                    // 'overdue_flag',
                    // 'card_address',
                    // 'live_desp',
                    // 'auto_work_year_id',
                    // 'family_net_assets',
                    // 'total_liabilities',
                    // 'from_other_biz_money',
                    // 'month_sales_amount',
                    // 'month_stock_num',
                    // 'growth_in_sales',
                    // 'sales_profit',
                    // 'turnover_days',
                    // 'turnover_days_min',
                    // 'forecasts_growth',
                    // 'credit_desp:ntext',
                    // 'biz_desp:ntext',
                    // 'financing_purpose:ntext',
                    // 'other_purpose:ntext',
                    // 'investigation:ntext',
                    // 'is_Lease_contract_flag',
                    // 'industry_experience_flag',
                    // 'second_hand_car_experience_flag',
                    // 'bad_credit_flag',
                    // 'cars_stop_number',
                    // 'remark',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

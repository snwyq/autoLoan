<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditSurvey */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Surveys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
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

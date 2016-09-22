<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloans */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans'), 'url' => ['index']];
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
            'money_channel_id',
            'money_channel_product_id',
            'give_money_time:datetime',
            'loan_money',
            'loan_term_id',
            'loan_period_id',
            'loan_money_rate',
            'loan_rate_type_id',
            'loan_pay_type_id',
            'fixed_day',
            'loan_start_time:datetime',
            'loan_end_time:datetime',
            'first_pay_date',
            'remark:ntext',
            'order',
            'status',
            'created_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

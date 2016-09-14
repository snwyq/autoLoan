<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'money_channel_id',
            'credit_money',
            'product_class_main_money',
            'product_class_part_money',
            'directional_credit_money',
            'immediately_credit_money',
            'single_credit_money',
            'credit_rating',
            'supervision_mode',
            'credit_period',
            'combination_rate',
            'inter_loan_limit',
            'start_time:datetime',
            'end_time:datetime',
            'condition:ntext',
            'description:ntext',
            'order',
            'status',
            'created_at',
            'updated_at',
            'created_by',
        ],
    ]) ?>
    </div>
</div>

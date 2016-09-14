<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMoneyChannelProduct */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Money Channel Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'money_channel_id',
            'product_class_id',
            'code',
            'name',
            'name_alias',
            'cost_rate_day',
            'cost_rate_month',
            'cost_rate_year',
            'sale_rate_day',
            'sale_rate_month',
            'sale_rate_year',
            'max_rate_add',
            'min_rate_add',
            'rate_type',
            'pay_period_var',
            'pay_type_var',
            'fixed_day',
            'status',
            'fine_grace_days',
            'fine_coefficient',
            'inerest_type',
            'money_type_id',
            'description:ntext',
            'order',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

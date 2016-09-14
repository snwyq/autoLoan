<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditApply */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Applies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
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
            'created_at',
            'updated_at',
            'company_id',
        ],
    ]) ?>
    </div>
</div>

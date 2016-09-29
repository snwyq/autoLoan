<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssess */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Assesses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'car_id',
            'loan_id',
            'customer_id',
            'car_displacement',
            'car_change_num',
            'first_plate_date',
            'car_mileage',
            'car_yearly_check_due_time:datetime',
            'car_insurance_due_time:datetime',
            'fire_car_flag',
            'car_water_flag',
            'car_insurance_due_description',
            'car_surface',
            'car_interior',
            'car_engine',
            'car_malfunction',
            'car_condition',
            'audit_assess_money',
            'audit_discount',
            'audit_money',
            'aduit_at',
            'audit_by',
            'audit_remark:ntext',
            'car_use',
            'car_owner',
            'car_checking_grade',
            'assess_by',
            'assess_at',
            'assess_discount',
            'assess_money',
            'car_description:ntext',
            'new_auto_price',
            'bigdata_price_1',
            'bigdata_price_2',
            'bigdata_price_3',
            'remark:ntext',
            'order',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

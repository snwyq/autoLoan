<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'loan_id',
            'customer_id',
            'car_brand_id',
            'car_series_id',
            'car_model_id',
            'car_displacement',
            'car_years',
            'car_engine_model_name',
            'car_vin',
            'car_outprice',
            'car_start_time:datetime',
            'car_out_time:datetime',
            'car_color',
            'car_interior_color',
            'order',
            'status',
            'created_at',
            'updated_at',
            'emission_standard',
        ],
    ]) ?>
    </div>
</div>

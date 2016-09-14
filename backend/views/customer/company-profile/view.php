<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyProfile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Company Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'name',
            'nick_name',
            'group_name',
            'actual_controller',
            'actual_controller_idno',
            'actual_controller_mobile',
            'contact',
            'contact_mobile',
            'contact_web_type',
            'telephone',
            'reg_time:datetime',
            'reg_province_id',
            'reg_city_id',
            'reg_area_id',
            'reg_address',
            'reg_capital',
            'real_begin_time:datetime',
            'province_id',
            'city_id',
            'area_id',
            'trade_address',
            'trade_market',
            'property',
            'company_type_id',
            'business_place_type_id',
            'business_licence_no',
            'organization_code',
            'employees_id',
            'main_business',
            'business_start_time:datetime',
            'business_end_time:datetime',
            'owned_industry_id',
            'customer_source',
            'status',
            'description:ntext',
            'longitude',
            'latitude',
            'manager_id',
            'store_area',
            'updated_by',
            'created_by',
            'updated_at',
            'created_at',
        ],
    ]) ?>
    </div>
</div>

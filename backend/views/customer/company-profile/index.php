<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CompanyProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Company Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Company Profile'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'customer_id',
                    'name',
                    'nick_name',
                    'group_name',
                    // 'actual_controller',
                    // 'actual_controller_idno',
                    // 'actual_controller_mobile',
                    // 'contact',
                    // 'contact_mobile',
                    // 'contact_web_type',
                    // 'telephone',
                    // 'reg_time:datetime',
                    // 'reg_province_id',
                    // 'reg_city_id',
                    // 'reg_area_id',
                    // 'reg_address',
                    // 'reg_capital',
                    // 'real_begin_time:datetime',
                    // 'province_id',
                    // 'city_id',
                    // 'area_id',
                    // 'trade_address',
                    // 'trade_market',
                    // 'property',
                    // 'company_type_id',
                    // 'business_place_type_id',
                    // 'business_licence_no',
                    // 'organization_code',
                    // 'employees_id',
                    // 'main_business',
                    // 'business_start_time:datetime',
                    // 'business_end_time:datetime',
                    // 'owned_industry_id',
                    // 'customer_source',
                    // 'status',
                    // 'description:ntext',
                    // 'longitude',
                    // 'latitude',
                    // 'manager_id',
                    // 'store_area',
                    // 'updated_by',
                    // 'created_by',
                    // 'updated_at',
                    // 'created_at',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

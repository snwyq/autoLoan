<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '车辆出库----监管车辆列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' '  ?>
<!--//Html::a(Yii::t('app', 'Create Loan Car'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>-->
<?php $this->endBlock() ?>

<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">条件搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>




<div class="nav-tabs-custom" style="margin: 0">
    <ul class="nav nav-pills">
        <?php foreach ($status as $k => $g): ?>
            <?php if($k>=0) :?>
                <li  <?php if ($k == (empty($_REQUEST['status']) ? '4' : $_REQUEST['status'])): ?> class="active"<?php endif; ?>><?= \common\helpers\Html::a($g, ['', 'status' => $k]) ?></li>
            <?php endif ; ?>
        <?php endforeach; ?>
    </ul>
</div>





<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                'id',
               // 'loan_id',

                [
                    'attribute' => 'loan_id',
                    'value' => function ($model) {
                        return \common\models\Loan::getLoanNo()[$model->loan_id];
                    }
                ],


                [
                    'attribute' => 'customer_id',
                    'value' => function ($model) {
                        return \common\models\Customer::getCustomerList()[$model->customer_id];
                    }
                ],

                //'customer_id',
//                'car_brand_id',
//                'car_series_id',
                [
                    'attribute' => 'car_model_id',
                    'value' => function ($model) {
                        return \common\models\AutoBrand::getBrand()[$model->car_brand_id] .
                        \common\models\AutoSeries::getAutoSeries()[$model->car_series_id] .
                        \common\models\AutoModel::getAutoModel()[$model->car_model_id];
                    }
                ],
                // 'car_model_id',
                // 'car_displacement',
                // 'car_years',
                // 'car_engine_model_name',
                // 'car_vin',
                // 'car_outprice',
                // 'car_start_time:datetime',
                // 'car_out_time:datetime',
                // 'car_color',
                // 'car_interior_color',
                // 'order',
               //  'status:text:状态',
                [
                    'attribute'=>'status',
                    'label'=>'状态',
                    'value'=>function ($model)
                    {
                        return  \common\models\LoanCar::getCarStatus()[$model->status];
                    }
                ],

                // 'created_at',
                // 'updated_at',
                // 'emission_standard',
                [

                    'attribute' => '操作',
                    'value' => function ($model) {
                        return  Html::a('出库',['loan-car-change/create','id'=>$model->id]);
                    },
                    'format' => 'raw',

                ],

//                ['class' => 'backend\widgets\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

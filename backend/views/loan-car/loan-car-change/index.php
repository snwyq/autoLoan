<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanCarChangeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '车辆置换单-列表');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title ?>
<?php $this->endBlock() ?>

<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">贷款搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>


<div class="nav-tabs-custom" style="margin: 0">
    <ul class="nav nav-pills">
        <?php foreach ($status as $k => $g): ?>
            <?php if ($k > 0) : ?>
                <li <?php if ($k == (empty($_REQUEST['status']) ? '3' : $_REQUEST['status'])): ?> class="active"<?php endif; ?>><?= \common\helpers\Html::a($g, ['', 'status' => $k]) ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>


<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //  'filterModel' => $searchModel,
            'columns' => [
                'id',
                'change_no:text:置换单号',
//                [
//                    'attribute' => 'loan_id',
//                    'value' => function ($model) {
//                        if (is_null($model->loan_id)) {
//                            return $model->loan_id;
//                        }
//                        return \common\models\Loan::getLoanNo()[$model->loan_id];
//                    }
//                ],


                ['attribute' => 'customer_id',
                    'value' => function ($model) {
                        if (is_null($model->customer_id)) {
                            return $model->customer_id;
                        }
                        return \common\models\Customer::getCustomerList()[$model->customer_id];
                    }
                ],


                // 'customer_id',
                //  'car_id',


                [
                    'attribute' => '置换车辆',
                    'value' => function ($model) {
                        return \common\models\AutoBrand::getBrand()[$model['loanCar']['car_brand_id']] .
                        \common\models\AutoSeries::getAutoSeries()[$model->loanCar->car_series_id] .
                        \common\models\AutoModel::getAutoModel()[$model->loanCar->car_model_id];
                    }
                ],

                'car_audit_money',
                'min_change_money',
                // 'car_id_new',
                // 'apply_time:datetime',
                // 'manager_id',
                // 'remark',
                // 'audit_at',
                // 'audit_by',
                //  'status',
                [
                    'attribute' => 'status',
                    'label' => '状态',
                    'value' => function ($model) {
                        return \common\models\LoanCarChange::getStatus()[$model->status];
                    }
                ],
                // 'order',
                'created_at:date',
                // 'updated_at',
                // 'created_by',
                [

                    'attribute' => '操作',
                    'value' => function ($model) {
                        return Html::a('置换详情', ['loan-car-change/loan-car-change-detail', 'id' => $model->id]);
                    },
                    'format' => 'raw',

                ],

                //  ['class' => 'backend\widgets\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

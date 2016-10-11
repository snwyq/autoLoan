<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanCarCheckSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '汽车盘库');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', '新增汽车盘库 '), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>
<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
            'columns' => [
                'id',
//                'loan_id',

                [
                    'attribute' => 'loan_id',
                    'value' => function ($model) {
                        return \common\models\Loan::getLoanNo()[$model->loan_id];
                    }
                ],
           //     'car_id',
                'loanCar.carBrandInfo:text:品牌',
               // 'check_class_id',
                [
                    'attribute' => 'check_class_id',
                    'value' => function ($model) {
                        return \common\models\LoanCarCheck::getCheckClass()[$model->check_class_id];
                    }
                ],

                [
                    'attribute' => 'check_type_id',
                    'value' => function ($model) {
                        return \common\models\LoanCarCheck::getCheckType()[$model->check_type_id];
                    }
                ],
                // 'plan_check_manager_by',
                 'plan_check_time:datetime',
                // 'check_by_id',
                [
                    'attribute' => 'check_result',
                    'value' => function ($model) {
                        return \common\models\LoanCarCheck::getCheckResult()[$model->check_result];
                    }
                ],

                // 'check_time:datetime',
                // 'check_description',
                // 'check_longitude',
                // 'check_latitude',
                // 'audit_status',
                // 'audit_by',
                // 'audit_description:ntext',
                //  'status',
//                  'created_at:datetime',
                // 'updated_at',

                ['class' => 'backend\widgets\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

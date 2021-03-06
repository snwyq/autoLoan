<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CustomerCreditApplySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '授信申请');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', '增加授信'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>


<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">授信搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
              //  'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'apply_no',
                    [
                        'attribute'=>'customer.name',
                        'label'=>'授信申请人'
                    ],
                    'province.name',
                    'city.name',
                    [
                        'attribute'=>'status',
                        'value' => function($model) {
                            return $model->getStatus()[$model->status];
                        },
                        'format' => 'raw'
                    ],
                    // 'area_id',
                    // 'apply_time:datetime',
                    // 'apply_manager_id',
                    // 'customer_class',
                    // 'apply_type_id',
                    // 'old_credit_money',
                    // 'to_credit_money',
                    // 'money_channel_id',
                    // 'apply_money',
                    // 'audit_money',
                    // 'audit_rate',
                    // 'description:ntext',
                     'status_remark:ntext',
                    // 'order',
                     'created_at:datetime',
                    // 'updated_at',
                    // 'company_id',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

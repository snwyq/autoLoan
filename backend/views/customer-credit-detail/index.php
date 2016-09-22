<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CustomerCreditDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '授信调整');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', '申请授信变更'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">授信搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>


</div>

<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                'id',
                'customerName.name',
                'productChannelName.name',
                'credit_money',

                ['attribute' => 'credit_money', 'content' => function($model, $key, $index){
                    return Html::a($model->credit_money, ['customer-credit-detail/view', 'id' => $model->id]);
                }, 'format' => 'raw'],

                'credit_money',

                'product_class_main_money',
                // 'product_class_part_money',
                // 'directional_credit_money',
                // 'immediately_credit_money',
                // 'single_credit_money',
                // 'credit_rating',
                // 'supervision_mode',
                // 'credit_period',
                // 'combination_rate',
                // 'inter_loan_limit',
                // 'start_time:datetime',
                // 'end_time:datetime',
                // 'condition:ntext',
                // 'description:ntext',
                // 'order',
                // 'status',
                // 'created_at',
                // 'updated_at',
                // 'created_by',

                [
                    'class' => 'backend\widgets\grid\ActionColumn',
                    'template'=>'{view}{change}{adddate}',
                    'buttons'=>[
                        'view' => function($url,$model,$key)
                        {
                            return Html::a('<span class="btn btn-default btn-sm">额度详情</span>', \yii\helpers\Url::toRoute(['customer-credit-detail/view','id'=>$key]),['title'=>'授信详情']);
                        },

                    'change' => function($url,$model,$key)
                    {
                        return Html::a('<span class="btn btn-primary btn-sm">额度变更</span>', \yii\helpers\Url::toRoute(['customer-credit-apply/create','id'=>$key,'type'=>2]),['title'=>'变更授信']);
                    },
                        'adddate' => function($url,$model,$key)
                        {
                            return Html::a('<span class="btn btn-danger btn-sm">授信延期</span>', \yii\helpers\Url::toRoute(['customer-credit-apply/create','id'=>$key,'type'=>2]),['title'=>'变更授信']);
                        },
                        ],

                ],
            ],
        ]); ?>
    </div>
</div>

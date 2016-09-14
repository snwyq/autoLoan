<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CustomerCreditDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '客户授信结果');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Customer Credit Detail'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
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

                ['class' => 'backend\widgets\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

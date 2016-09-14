<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductMoneyChannelProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Money Channel Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Product Money Channel Product'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">产品分类搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>
<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
            'columns' => [
                'id',
                'name',
                'name_alias',
                'productMoneyChannel.name',
                'productClass.name',
                'code',

                // 'cost_rate_day',
                // 'cost_rate_month',
                // 'cost_rate_year',
                // 'sale_rate_day',
                // 'sale_rate_month',
                // 'sale_rate_year',
                // 'max_rate_add',
                // 'min_rate_add',
                // 'rate_type',
                // 'pay_period_var',
                // 'pay_type_var',
                // 'fixed_day',
                // 'status',
                // 'fine_grace_days',
                // 'fine_coefficient',
                // 'inerest_type',
                // 'money_type_id',
                // 'description:ntext',
                // 'order',
                // 'created_at',
                // 'updated_at',

                ['class' => 'backend\widgets\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>

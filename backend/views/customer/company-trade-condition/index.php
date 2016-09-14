

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonFamilyMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款企业列表'), 'url' => ['customer/company']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '经营状态'), 'url' => ['customer/trade-condition-list', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>

    <div class="box box-primary">
        <div class="box-body">

            <?= Html::a(Yii::t('app', '增加'), ['company-trade-condition/create', 'id' => $customer->id], ['class' => 'btn btn-primary pull-right']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'customer_id',
                    'year',
                    'month',
                    'trade_count',
                    // 'trade_money',
                    // 'trade_cost',
                    // 'trade_profit_margin',
                    // 'sell_num',
                    // 'sell_money',
                    // 'stock_money',
                    // 'sell_condition',
                    // 'buy_condition',
                    // 'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',
                    ['class' => 'backend\widgets\grid\ActionColumn',
                        'controller' => 'company-trade-condition'],
                ],
            ]); ?>
        </div>
    </div>
<?php $this->endContent() ?>
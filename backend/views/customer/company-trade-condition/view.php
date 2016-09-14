
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '经营状况';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '经营状况'), 'url' => ['customer/trade-condition-list','id'=>$customer->id]];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>
    <div class="box box-primary">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'customer_id',
                    'year',
                    'month',
                    'trade_count',
                    'trade_money',
                    'trade_cost',
                    'trade_profit_margin',
                    'sell_num',
                    'sell_money',
                    'stock_money',
                    'sell_condition',
                    'buy_condition',
                    'remark:ntext',
                    'order',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>

<?php $this->endContent() ?>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanMakeloansPayPlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loan Makeloans Pay Plans');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan Makeloans Pay Plan'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
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
                    'customer_id',
                    'loan_id',
                    'makeloan_id',
                    'back_money_time:datetime',
                    // 'back_money',
                    // 'urged_time:datetime',
                    // 'change_money',
                    // 'real_back_money_time:datetime',
                    // 'principal_money',
                    // 'interest_money',
                    // 'remaining_money',
                    // 'is_overdual',
                    // 'manager_id',
                    // 'remark:ntext',
                    // 'attachment_num',
                    // 'order',
                    // 'status',
                    // 'is_compensatory',
                    // 'is_urged',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

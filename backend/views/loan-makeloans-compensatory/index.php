<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanMakeloansCompensatorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loan Makeloans Compensatories');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan Makeloans Compensatory'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>
    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'customer_id',
                    'loan_id',
                    'makeloans_id',
                    'pay_plan_id',
                    // 'money_back_time:datetime',
                    // 'money_end_time:datetime',
                    // 'money_back_money',
                    // 'overdue_days',
                    // 'overdue_prit',
                    // 'overdue_inst',
                    // 'overdue_penalty',
                    // 'is_repayment',
                    // 'type',
                    // 'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_by',
                    // 'updated_at',
                    // 'created_at',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

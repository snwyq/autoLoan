<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanMakeloansSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loan Makeloans');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan Makeloans'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'customer_id',
                    'loan_id',
                    'money_channel_id',
                    'money_channel_product_id',
                    // 'give_money_time:datetime',
                    // 'loan_money',
                    // 'loan_term_id',
                    // 'loan_period_id',
                    // 'loan_money_rate',
                    // 'loan_rate_type_id',
                    // 'loan_pay_type_id',
                    // 'fixed_day',
                    // 'loan_start_time:datetime',
                    // 'loan_end_time:datetime',
                    // 'first_pay_date',
                    // 'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_by',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

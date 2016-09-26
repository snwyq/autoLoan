<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanCarAssessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loan Car Assesses');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan Car Assess'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
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
                    'car_id',
                    'loan_id',
                    'customer_id',
                    'car_displacement',
                    // 'car_change_num',
                    // 'first_plate_date',
                    // 'car_mileage',
                    // 'car_yearly_check_due_time:datetime',
                    // 'car_insurance_due_time:datetime',
                    // 'fire_car_flag',
                    // 'car_water_flag',
                    // 'car_insurance_due_description',
                    // 'car_surface',
                    // 'car_interior',
                    // 'car_engine',
                    // 'car_malfunction',
                    // 'car_condition',
                    // 'audit_assess_money',
                    // 'audit_discount',
                    // 'audit_money',
                    // 'aduit_at',
                    // 'audit_by',
                    // 'audit_remark:ntext',
                    // 'car_use',
                    // 'car_owner',
                    // 'car_checking_grade',
                    // 'assess_by',
                    // 'assess_at',
                    // 'assess_discount',
                    // 'assess_money',
                    // 'car_description:ntext',
                    // 'new_auto_price',
                    // 'bigdata_price_1',
                    // 'bigdata_price_2',
                    // 'bigdata_price_3',
                    // 'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

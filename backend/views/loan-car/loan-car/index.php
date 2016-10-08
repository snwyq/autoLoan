<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanCarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loan Cars');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan Car'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
               // 'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'loan_id',
                    'customer_id',
                    'car_brand_id',
                    'car_series_id',
                    // 'car_model_id',
                    // 'car_displacement',
                    // 'car_years',
                    // 'car_engine_model_name',
                    // 'car_vin',
                    // 'car_outprice',
                    // 'car_start_time:datetime',
                    // 'car_out_time:datetime',
                    // 'car_color',
                    // 'car_interior_color',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',
                    // 'emission_standard',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

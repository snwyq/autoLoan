<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\LoanCarAssessControlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Loan Car Assess Controls');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Loan Car Assess Control'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'car_id',
                    'loan_id',
                    'put_stor_time:datetime',
                    'put_stor_reason',
                    // 'tag_code',
                    // 'car_owner',
                    // 'control_by_id',
                    // 'control_time:datetime',
                    // 'control_type',
                    // 'car_certificate_number',
                    // 'control_address',
                    // 'transfer_person',
                    // 'transfer_telephone',
                    // 'transfer_card_number',
                    // 'transfer_time:datetime',
                    // 'car_license_number',
                    // 'control_description',
                    // 'if_all_docment',
                    // 'car_condition',
                    // 'order',
                    // 'remarks',
                    // 'status',
                    // 'created_by',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

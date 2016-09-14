
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonFamilyMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '企业列表'), 'url' => ['customer/company']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '其它借款'), 'url' => ['customer/other-loan-list', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>

    <div class="box box-primary">
        <div class="box-body">

            <?= Html::a(Yii::t('app', '增加'), ['company-other-loan/create', 'id' => $customer->id], ['class' => 'btn btn-primary pull-right']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'customer_id',
                    'loan_name',
                    'loan_num',
                    'loan_remainder',
                    // 'start_time:datetime',
                    // 'end_time:datetime',
                    // 'loan_type_id',
                    // 'overdue_num',
                    // 'loan_bank',
                    // 'loan_type_by',
                    // 'sued_flag',
                    // 'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn',
                        'controller' => 'company-other-loan'],
                ],
            ]); ?>
        </div>
    </div>
<?php $this->endContent() ?>
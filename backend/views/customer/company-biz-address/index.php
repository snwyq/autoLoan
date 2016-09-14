


<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonFamilyMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款企业'), 'url' => ['customer/company']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '经营地址'), 'url' => ['customer/biz-address-list', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>

    <div class="box box-primary">
        <div class="box-body">

            <?= Html::a(Yii::t('app', '增加'), ['company-biz-address/create', 'id' => $customer->id], ['class' => 'btn btn-primary pull-right']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'customer_id',
                    'address',
                    'modality',
                    'area',
                    // 'start_time:datetime',
                    // 'end_time:datetime',
                    // 'coordinate_x',
                    // 'coordinate_y',
                    // 'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn',
                        'controller' => 'company-biz-address'],
                ],
            ]); ?>
        </div>
    </div>
<?php $this->endContent() ?>
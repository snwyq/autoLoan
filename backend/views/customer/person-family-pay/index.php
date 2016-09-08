<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonFamilyMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款人列表'), 'url' => ['customer/person']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '家庭成员'), 'url' => ['customer/family-member-list', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutperson.php", ['customer' => $customer]) ?>


    <div class="box box-primary">


        <div class="box-body">

            <?= Html::a(Yii::t('app', '增加'), ['person-family-pay/create', 'id' => $customer->id], ['class' => 'btn btn-primary pull-right']) ?>


            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'customer_id',
                    'pay_type',
                    'price_amount',
                    'remark',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn',
                        'controller' => 'person-family-pay'],
                ],
            ]); ?>
        </div>
    </div>


<?php $this->endContent() ?>




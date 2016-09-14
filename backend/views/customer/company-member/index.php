


<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonFamilyMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '企业列表'), 'url' => ['customer/company']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '企业成员列表'), 'url' => ['customer/company-member-list', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>

    <div class="box box-primary">
        <div class="box-body">

            <?= Html::a(Yii::t('app', '增加'), ['company-member/create', 'id' => $customer->id], ['class' => 'btn btn-primary pull-right']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'customer_id',
                    'name',
                    'card_number',
                    'telephone',
                    // 'other_link_type',
                    // 'role_type',
                    // 'sex_id',
                    // 'educational_id',
                    // 'work_position',
                    // 'is_work_contacts',
                    // 'address',
                    // 'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'backend\widgets\grid\ActionColumn',
                        'controller' => 'company-member'],
                ],
            ]); ?>
        </div>
    </div>
<?php $this->endContent() ?>
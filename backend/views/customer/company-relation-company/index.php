<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonFamilyMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款企业列表'), 'url' => ['customer/company']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '关联企业列表'), 'url' => ['customer/relation-company-list', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>

    <div class="box box-primary">
        <div class="box-body">

            <?= Html::a(Yii::t('app', '增加'), ['company-relation-company/create', 'id' => $customer->id], ['class' => 'btn btn-primary pull-right']) ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
                'columns' => [
                    'id',
                    'customer_id',
                    'company_name',
                    'rela_form',
                    'remark:ntext',
                    // 'order',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',
                    // 'rela_customer_id',


                    ['class' => 'backend\widgets\grid\ActionColumn',
                        'controller' => 'company-relation-company'],
                ],
            ]); ?>
        </div>
    </div>
<?php $this->endContent() ?>
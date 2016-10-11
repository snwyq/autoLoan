<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii2tech\admin\grid;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '借款人');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', '新增借款人'), ['create-person'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>



<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">条件搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => [
                //'id',
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'name',
                    'label' => '借款人名称',
                ],
                'code',
                [
                    'attribute' => 'company_name',
                    'label' => '所属企业',
                ],
                // 'link_name',
                // 'card_number',
                // 'card_address',
                // 'province_id',
                // 'city_id',
                // 'city_proper_id',
                // 'address',
                // 'email:email',
                'mobile',
                // 'status',
                // 'src_id',
                // 'manager_id',
                'description:ntext',
                // 'remarks:ntext',
                'created_at:date',
                // 'updated_at',
                // 'create_by',
                // 'update_by',
                // 'block_at',
                // 'confirmed_at',

                [
                    'class' => 'backend\widgets\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            return ['view-person', 'id' => $model->id];
                        } else if ($action === 'update') {
                            return ['update-person', 'id' => $model->id];
                        }
                    }

                ],

            ],
        ]); ?>
    </div>
</div>

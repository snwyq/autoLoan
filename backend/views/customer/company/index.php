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
<?= $this->title . ' ' . Html::a(Yii::t('app', '新增借款人'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="box box-primary">
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //'id',

                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute'=>'name',
                    'label'=>'企业名称',
                ],
                'code',

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
//                 'description:ntext',
                [
                    'attribute'=>'description',
                    'options'=>[
                        'width'=>'30%',
                    ]
                ],
                // 'remarks:ntext',
                'created_at:date',
                // 'updated_at',
                // 'create_by',
                // 'update_by',
                // 'block_at',
                // 'confirmed_at',

                ['class' => 'backend\widgets\grid\ActionColumn'],

            ],
        ]); ?>
    </div>
</div>

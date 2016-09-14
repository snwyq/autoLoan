<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductMoneyChannelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Money Channels');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Product Money Channel'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">产品分类搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>
    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
        'columns' => [
                    'id',
            'name',
                    'code',

                    'contacts_name',
                    'contacts_phone',
                    // 'company_type_id',
                    // 'province_id',
                    // 'city_id',
                    // 'area_id',
                    // 'address',
                    // 'description:ntext',
                    // 'created_at',
                    // 'updated_at',
                    // 'status',
                    // 'order',
                    // 'begin_time:datetime',
                    // 'end_time:datetime',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

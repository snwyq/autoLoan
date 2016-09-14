<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductClassSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '金融产品分类');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Product Class'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
<div class="box box-primary">
    <div class="box-header"><h2 class="box-title">产品分类搜索</h2></div>
    <div class="box-body"><?php echo $this->render('_search', ['model' => $searchModel]); ?></div>
</div>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
              //  'filterModel' => $searchModel,
        'columns' => [
                    'id',
                  //  'pid',
                    'code',
                    'name',
                    'name_alias',
                     'status',
                     'order',
                     'created_at:datetime',
                     'updated_at:datetime',
                     'description:ntext',
                     'manager_id',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonWorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Person Works');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '工作经历'), 'url' => ['customer/person-work-list', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutperson.php", ['customer' => $customer]) ?>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="box box-primary">
    <div class="box-body">
        <?= Html::a(Yii::t('app', '增加'), ['person-work/create','id'=>$customer->id], ['class' => 'btn btn-primary pull-right']) ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//                'filterModel' => $searchModel,
            'columns' => [
                'id',
                'customer_id',
                'start_time:datetime',
                'end_time:datetime',
                'company',
                // 'position',
                // 'phone',
                // 'detail',
                // 'status',
                // 'order',
                // 'created_at',
                // 'updated_at',

                ['class' => 'backend\widgets\grid\ActionColumn',
                    'controller' => 'person-work'
                ],
            ],
        ]); ?>
    </div>
</div>
<?php $this->endContent() ?>

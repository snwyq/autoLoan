<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SystemLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '系统日志';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-log-index">

    <p>
        <?php echo Html::a('清除', false, ['class' => 'btn btn-danger btn-flat', 'data-method'=>'delete']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box box-primary">
        <div class="box-body">
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute'=>'level',
                        'value'=>function ($model) {
                            return \yii\log\Logger::getLevelName($model->level);
                        },
                        'filter'=>[
                            \yii\log\Logger::LEVEL_ERROR => 'error',
                            \yii\log\Logger::LEVEL_WARNING => 'warning',
                            \yii\log\Logger::LEVEL_INFO => 'info',
                            \yii\log\Logger::LEVEL_TRACE => 'trace',
                            \yii\log\Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
                            \yii\log\Logger::LEVEL_PROFILE_END => 'profile end'
                        ]
                    ],
                    'category',
                    'prefix',
                    [
                        'attribute' => 'log_time',
                        'format' => 'datetime',
                        'value' => function ($model) {
                            return (int) $model->log_time;
                        }
                    ],

                    [
                        'class' => 'backend\widgets\grid\ActionColumn',
                        'template'=>'{view} {delete}'
                    ]
                ]
            ]); ?>
        </div>
    </div>
</div>

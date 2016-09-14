<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditProcessHis */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Process His'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'apply_id',
            'manager_id',
            'result_id',
            'remark:ntext',
            'create_time:datetime',
            'update_time:datetime',
            'status',
            'order',
        ],
    ]) ?>
    </div>
</div>

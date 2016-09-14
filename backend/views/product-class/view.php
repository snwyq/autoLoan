<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductClass */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Classes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pid',
            'code',
            'name',
            'name_alias',
            'status',
            'order',
            'created_at',
            'updated_at',
            'description:ntext',
            'manager_id',
        ],
    ]) ?>
    </div>
</div>

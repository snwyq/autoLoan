<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMoneyChannel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Money Channels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'name',
            'contacts_name',
            'contacts_phone',
            'company_type_id',
            'province_id',
            'city_id',
            'area_id',
            'address',
            'description:ntext',
            'created_at',
            'updated_at',
            'status',
            'order',
            'begin_time:datetime',
            'end_time:datetime',
        ],
    ]) ?>
    </div>
</div>

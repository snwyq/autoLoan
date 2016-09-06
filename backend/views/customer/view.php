<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'class',
            'name',
            'company_name',
            'link_name',
            'card_number',
            'card_address',
            'province_id',
            'city_id',
            'city_proper_id',
            'address',
            'email:email',
            'mobile',
            'status',
            'src_id',
            'manager_id',
            'description:ntext',
            'remarks:ntext',
            'created_at:datetime',
            'updated_at:datetime',
            'created_by',
            'updated_by',
            'block_at',
            'confirmed_at',
        ],
    ]) ?>
    </div>
</div>

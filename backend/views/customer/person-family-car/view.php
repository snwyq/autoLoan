<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '自用汽车';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '自用汽车'), 'url' => ['customer/family-car-list','id'=>$customer->id]];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $this->beginContent("@backend/views/customer/layoutperson.php", ['customer' => $customer]) ?>

<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'user_name',
            'brand_id',
            'series_id',
            'auto_type_id',
            'car_plate',
            'buytime:datetime',
            'price',
            'mileage',
            'remark:ntext',
            'order',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

<?php $this->endContent() ?>
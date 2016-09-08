<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '家庭房产';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '家庭房产'), 'url' => ['customer/family-house-list','id'=>$customer->id]];
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
            'name',
            'house_type',
            'area',
            'price',
            'address',
            'loan_flag',
            'decorate_type',
            'rent_flag',
            'remark',
            'order',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

<?php $this->endContent() ?>
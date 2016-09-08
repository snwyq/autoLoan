<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '家庭成员'), 'url' => ['customer/family-member-list','id'=>$customer->id]];
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
            'relation_type',
            'type',
            'card_number',
            'phone',
            'company',
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
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '借记卡';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借记卡'), 'url' => ['customer/family-debitcard-list','id'=>$customer->id]];
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
            'bank',
            'credit_amount',
            'used_amount',
            'half_year_amount',
            'overdue_num',
            'guaranty_flag',
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
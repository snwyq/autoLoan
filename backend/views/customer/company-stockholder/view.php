


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '股东结构';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '股东结构'), 'url' => ['customer/stockholder-list','id'=>$customer->id]];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>
    <div class="box box-primary">
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'customer_id',
                    'name',
                    'capital_amount',
                    'reality_amount',
                    'investment_type',
                    'card_number',
                    'investment_rate',
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
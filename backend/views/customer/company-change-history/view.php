


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '变更历史';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '变更历史'), 'url' => ['customer/change-history-list','id'=>$customer->id]];
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
                    'change_time:datetime',
                    'change_title',
                    'before_content:ntext',
                    'after_content:ntext',
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
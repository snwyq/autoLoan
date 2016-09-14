


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '关联公司';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '关联公司'), 'url' => ['customer/relation-company-list','id'=>$customer->id]];
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
                    'company_name',
                    'rela_form',
                    'remark:ntext',
                    'order',
                    'status',
                    'created_at',
                    'updated_at',
                    'rela_customer_id',
                ],
            ]) ?>
        </div>
    </div>

<?php $this->endContent() ?>
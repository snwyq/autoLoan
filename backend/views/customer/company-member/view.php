
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '公司高管';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '公司高管'), 'url' => ['customer/member-list','id'=>$customer->id]];
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
                    'card_number',
                    'telephone',
                    'other_link_type',
                    'role_type',
                    'sex_id',
                    'educational_id',
                    'work_position',
                    'is_work_contacts',
                    'address',
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
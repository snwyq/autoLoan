
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */

$this->title = '其它借款';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '其它借款'), 'url' => ['customer/other-loan-list','id'=>$customer->id]];
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
                    'loan_name',
                    'loan_num',
                    'loan_remainder',
                    'start_time:datetime',
                    'end_time:datetime',
                    'loan_type_id',
                    'overdue_num',
                    'loan_bank',
                    'loan_type_by',
                    'sued_flag',
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
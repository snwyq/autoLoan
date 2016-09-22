<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansPayPlan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Makeloans Pay Plans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'loan_id',
            'makeloan_id',
            'back_money_time:datetime',
            'back_money',
            'urged_time:datetime',
            'change_money',
            'real_back_money_time:datetime',
            'principal_money',
            'interest_money',
            'remaining_money',
            'is_overdual',
            'manager_id',
            'remark:ntext',
            'attachment_num',
            'order',
            'status',
            'is_compensatory',
            'is_urged',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

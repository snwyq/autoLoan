<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssessControl */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Assess Controls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'car_id',
            'loan_id',
            'put_stor_time:datetime',
            'put_stor_reason',
            'tag_code',
            'car_owner',
            'control_by_id',
            'control_time:datetime',
            'control_type',
            'car_certificate_number',
            'control_address',
            'transfer_person',
            'transfer_telephone',
            'transfer_card_number',
            'transfer_time:datetime',
            'car_license_number',
            'control_description',
            'if_all_docment',
            'car_condition',
            'order',
            'remarks',
            'status',
            'created_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    </div>
</div>

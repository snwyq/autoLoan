<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PersonProfile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'company_id',
            'company_name',
            'name',
            'sex_id',
            'nation',
            'card_type_id',
            'card_number',
            'card_province_id',
            'card_city_id',
            'card_area_id',
            'card_address',
            'province_id',
            'city_id',
            'area_id',
            'address',
            'educational_id',
            'marriage_type_id',
            'houseflag',
            'email:email',
            'birth',
            'mobile_phone',
            'auto_work_year_id',
            'work_position_id',
            'income',
            'company_address',
            'phone',
            'other_contact',
            'other_phone',
            'description:ntext',
            'status',
            'order',
            'agent_name',
            'attachment_num',
            'src_channel_id',
            'create_time:datetime',
            'update_time:datetime',
            'client_manager_id',
            'login_name',
            'password',
            'work_years',
            'audit_credit_rating_id',
            'created_by',
        ],
    ]) ?>
    </div>
</div>

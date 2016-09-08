<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PersonProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Person Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginBlock('content-header') ?>
<?= $this->title . ' ' . Html::a(Yii::t('app', 'Create Person Profile'), ['create'], ['class' => 'btn btn-primary btn-flat btn-xs']) ?>
<?php $this->endBlock() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary">
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                    'id',
                    'customer_id',
                    'company_id',
                    'company_name',
                    'name',
                    // 'sex_id',
                    // 'nation',
                    // 'card_type_id',
                    // 'card_number',
                    // 'card_province_id',
                    // 'card_city_id',
                    // 'card_area_id',
                    // 'card_address',
                    // 'province_id',
                    // 'city_id',
                    // 'area_id',
                    // 'address',
                    // 'educational_id',
                    // 'marriage_type_id',
                    // 'houseflag',
                    // 'email:email',
                    // 'birth',
                    // 'mobile_phone',
                    // 'auto_work_year_id',
                    // 'work_position_id',
                    // 'income',
                    // 'company_address',
                    // 'phone',
                    // 'other_contact',
                    // 'other_phone',
                    // 'description:ntext',
                    // 'status',
                    // 'order',
                    // 'agent_name',
                    // 'attachment_num',
                    // 'src_channel_id',
                    // 'create_time:datetime',
                    // 'update_time:datetime',
                    // 'client_manager_id',
                    // 'login_name',
                    // 'password',
                    // 'work_years',
                    // 'audit_credit_rating_id',
                    // 'created_by',

                    ['class' => 'backend\widgets\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

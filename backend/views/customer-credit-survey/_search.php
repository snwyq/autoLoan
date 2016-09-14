<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CustomerCreditSurveySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-credit-survey-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'apply_id') ?>

    <?= $form->field($model, 'suvey_by') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'oldcustomer_flag') ?>

    <?php // echo $form->field($model, 'overdue_flag') ?>

    <?php // echo $form->field($model, 'card_address') ?>

    <?php // echo $form->field($model, 'live_desp') ?>

    <?php // echo $form->field($model, 'auto_work_year_id') ?>

    <?php // echo $form->field($model, 'family_net_assets') ?>

    <?php // echo $form->field($model, 'total_liabilities') ?>

    <?php // echo $form->field($model, 'from_other_biz_money') ?>

    <?php // echo $form->field($model, 'month_sales_amount') ?>

    <?php // echo $form->field($model, 'month_stock_num') ?>

    <?php // echo $form->field($model, 'growth_in_sales') ?>

    <?php // echo $form->field($model, 'sales_profit') ?>

    <?php // echo $form->field($model, 'turnover_days') ?>

    <?php // echo $form->field($model, 'turnover_days_min') ?>

    <?php // echo $form->field($model, 'forecasts_growth') ?>

    <?php // echo $form->field($model, 'credit_desp') ?>

    <?php // echo $form->field($model, 'biz_desp') ?>

    <?php // echo $form->field($model, 'financing_purpose') ?>

    <?php // echo $form->field($model, 'other_purpose') ?>

    <?php // echo $form->field($model, 'investigation') ?>

    <?php // echo $form->field($model, 'is_Lease_contract_flag') ?>

    <?php // echo $form->field($model, 'industry_experience_flag') ?>

    <?php // echo $form->field($model, 'second_hand_car_experience_flag') ?>

    <?php // echo $form->field($model, 'bad_credit_flag') ?>

    <?php // echo $form->field($model, 'cars_stop_number') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

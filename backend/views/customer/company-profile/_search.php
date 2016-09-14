<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'nick_name') ?>

    <?= $form->field($model, 'group_name') ?>

    <?php // echo $form->field($model, 'actual_controller') ?>

    <?php // echo $form->field($model, 'actual_controller_idno') ?>

    <?php // echo $form->field($model, 'actual_controller_mobile') ?>

    <?php // echo $form->field($model, 'contact') ?>

    <?php // echo $form->field($model, 'contact_mobile') ?>

    <?php // echo $form->field($model, 'contact_web_type') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'reg_time') ?>

    <?php // echo $form->field($model, 'reg_province_id') ?>

    <?php // echo $form->field($model, 'reg_city_id') ?>

    <?php // echo $form->field($model, 'reg_area_id') ?>

    <?php // echo $form->field($model, 'reg_address') ?>

    <?php // echo $form->field($model, 'reg_capital') ?>

    <?php // echo $form->field($model, 'real_begin_time') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'trade_address') ?>

    <?php // echo $form->field($model, 'trade_market') ?>

    <?php // echo $form->field($model, 'property') ?>

    <?php // echo $form->field($model, 'company_type_id') ?>

    <?php // echo $form->field($model, 'business_place_type_id') ?>

    <?php // echo $form->field($model, 'business_licence_no') ?>

    <?php // echo $form->field($model, 'organization_code') ?>

    <?php // echo $form->field($model, 'employees_id') ?>

    <?php // echo $form->field($model, 'main_business') ?>

    <?php // echo $form->field($model, 'business_start_time') ?>

    <?php // echo $form->field($model, 'business_end_time') ?>

    <?php // echo $form->field($model, 'owned_industry_id') ?>

    <?php // echo $form->field($model, 'customer_source') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'manager_id') ?>

    <?php // echo $form->field($model, 'store_area') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

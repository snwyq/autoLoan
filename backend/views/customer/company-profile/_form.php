<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyProfile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nick_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actual_controller')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actual_controller_idno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actual_controller_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_web_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_time')->textInput() ?>

    <?= $form->field($model, 'reg_province_id')->textInput() ?>

    <?= $form->field($model, 'reg_city_id')->textInput() ?>

    <?= $form->field($model, 'reg_area_id')->textInput() ?>

    <?= $form->field($model, 'reg_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reg_capital')->textInput() ?>

    <?= $form->field($model, 'real_begin_time')->textInput() ?>

    <?= $form->field($model, 'province_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'area_id')->textInput() ?>

    <?= $form->field($model, 'trade_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trade_market')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_type_id')->textInput() ?>

    <?= $form->field($model, 'business_place_type_id')->textInput() ?>

    <?= $form->field($model, 'business_licence_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employees_id')->textInput() ?>

    <?= $form->field($model, 'main_business')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_start_time')->textInput() ?>

    <?= $form->field($model, 'business_end_time')->textInput() ?>

    <?= $form->field($model, 'owned_industry_id')->textInput() ?>

    <?= $form->field($model, 'customer_source')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manager_id')->textInput() ?>

    <?= $form->field($model, 'store_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

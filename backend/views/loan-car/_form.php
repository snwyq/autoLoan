<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class=" col-md-12  well">

            <div class="col-md-6">

                <?= $form->field($model, 'loan_id')->textInput() ?>

                <?= $form->field($model, 'customer_id')->textInput() ?>

                <?= $form->field($model, 'car_brand_id')->textInput() ?>

                <?= $form->field($model, 'car_series_id')->textInput() ?>

                <?= $form->field($model, 'car_model_id')->textInput() ?>

                <?= $form->field($model, 'car_displacement')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'car_years')->textInput() ?>

                <?= $form->field($model, 'car_engine_model_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'car_vin')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">

                <?= $form->field($model, 'car_outprice')->textInput() ?>

                <?= $form->field($model, 'car_start_time')->textInput() ?>

                <?= $form->field($model, 'car_out_time')->textInput() ?>

                <?= $form->field($model, 'car_color')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'car_interior_color')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'order')->textInput() ?>

                <?= $form->field($model, 'status')->textInput() ?>

                <?= $form->field($model, 'emission_standard')->textInput(['maxlength' => true]) ?>
            </div>
        </div>


        <div class=" col-md-12  well">

            <div class="col-md-6">
                <?= $form->field($assessmodel, 'car_id')->textInput() ?>

                <?= $form->field($assessmodel, 'loan_id')->textInput() ?>

                <?= $form->field($assessmodel, 'customer_id')->textInput() ?>

                <?= $form->field($assessmodel, 'car_displacement')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_change_num')->textInput() ?>

                <?= $form->field($assessmodel, 'first_plate_date')->textInput() ?>

                <?= $form->field($assessmodel, 'car_mileage')->textInput() ?>

                <?= $form->field($assessmodel, 'car_yearly_check_due_time')->textInput() ?>

                <?= $form->field($assessmodel, 'car_insurance_due_time')->textInput() ?>

                <?= $form->field($assessmodel, 'fire_car_flag')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_water_flag')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_insurance_due_description')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_surface')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_interior')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_engine')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_malfunction')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_condition')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'audit_assess_money')->textInput() ?>

                <?= $form->field($assessmodel, 'audit_discount')->textInput() ?>

                <?= $form->field($assessmodel, 'audit_money')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($assessmodel, 'aduit_at')->textInput() ?>

                <?= $form->field($assessmodel, 'audit_by')->textInput() ?>

                <?= $form->field($assessmodel, 'audit_remark')->textarea(['rows' => 6]) ?>

                <?= $form->field($assessmodel, 'car_use')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_owner')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_checking_grade')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'assess_by')->textInput() ?>

                <?= $form->field($assessmodel, 'assess_at')->textInput() ?>

                <?= $form->field($assessmodel, 'assess_discount')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'assess_money')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'car_description')->textarea(['rows' => 6]) ?>

                <?= $form->field($assessmodel, 'new_auto_price')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'bigdata_price_1')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'bigdata_price_2')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'bigdata_price_3')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'remark')->textarea(['rows' => 6]) ?>

                <?= $form->field($assessmodel, 'order')->textInput() ?>

                <?= $form->field($assessmodel, 'status')->textInput() ?>

            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

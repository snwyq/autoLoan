<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssess */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_id')->textInput() ?>

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'car_displacement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_change_num')->textInput() ?>

    <?= $form->field($model, 'first_plate_date')->textInput() ?>

    <?= $form->field($model, 'car_mileage')->textInput() ?>

    <?= $form->field($model, 'car_yearly_check_due_time')->textInput() ?>

    <?= $form->field($model, 'car_insurance_due_time')->textInput() ?>

    <?= $form->field($model, 'fire_car_flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_water_flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_insurance_due_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_surface')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_interior')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_engine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_malfunction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_condition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audit_assess_money')->textInput() ?>

    <?= $form->field($model, 'audit_discount')->textInput() ?>

    <?= $form->field($model, 'audit_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aduit_at')->textInput() ?>

    <?= $form->field($model, 'audit_by')->textInput() ?>

    <?= $form->field($model, 'audit_remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'car_use')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_checking_grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assess_by')->textInput() ?>

    <?= $form->field($model, 'assess_at')->textInput() ?>

    <?= $form->field($model, 'assess_discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assess_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'new_auto_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bigdata_price_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bigdata_price_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bigdata_price_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

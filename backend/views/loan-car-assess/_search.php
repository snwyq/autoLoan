<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanCarAssessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-car-assess-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'car_displacement') ?>

    <?php // echo $form->field($model, 'car_change_num') ?>

    <?php // echo $form->field($model, 'first_plate_date') ?>

    <?php // echo $form->field($model, 'car_mileage') ?>

    <?php // echo $form->field($model, 'car_yearly_check_due_time') ?>

    <?php // echo $form->field($model, 'car_insurance_due_time') ?>

    <?php // echo $form->field($model, 'fire_car_flag') ?>

    <?php // echo $form->field($model, 'car_water_flag') ?>

    <?php // echo $form->field($model, 'car_insurance_due_description') ?>

    <?php // echo $form->field($model, 'car_surface') ?>

    <?php // echo $form->field($model, 'car_interior') ?>

    <?php // echo $form->field($model, 'car_engine') ?>

    <?php // echo $form->field($model, 'car_malfunction') ?>

    <?php // echo $form->field($model, 'car_condition') ?>

    <?php // echo $form->field($model, 'audit_assess_money') ?>

    <?php // echo $form->field($model, 'audit_discount') ?>

    <?php // echo $form->field($model, 'audit_money') ?>

    <?php // echo $form->field($model, 'aduit_at') ?>

    <?php // echo $form->field($model, 'audit_by') ?>

    <?php // echo $form->field($model, 'audit_remark') ?>

    <?php // echo $form->field($model, 'car_use') ?>

    <?php // echo $form->field($model, 'car_owner') ?>

    <?php // echo $form->field($model, 'car_checking_grade') ?>

    <?php // echo $form->field($model, 'assess_by') ?>

    <?php // echo $form->field($model, 'assess_at') ?>

    <?php // echo $form->field($model, 'assess_discount') ?>

    <?php // echo $form->field($model, 'assess_money') ?>

    <?php // echo $form->field($model, 'car_description') ?>

    <?php // echo $form->field($model, 'new_auto_price') ?>

    <?php // echo $form->field($model, 'bigdata_price_1') ?>

    <?php // echo $form->field($model, 'bigdata_price_2') ?>

    <?php // echo $form->field($model, 'bigdata_price_3') ?>

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

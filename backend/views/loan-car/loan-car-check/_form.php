<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarCheck */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'loan_id')->dropDownList(\common\models\Loan::getLoanNo()) ?>

        <?= $form->field($model, 'car_id')->dropDownList(\common\models\LoanCar::getLoanCar()) ?>

        <?= $form->field($model, 'check_class_id')->dropDownList(\common\models\LoanCarCheck::getCheckClass()) ?>

        <?= $form->field($model, 'check_type_id')->dropDownList(\common\models\LoanCarCheck::getCheckType()) ?>

        <?= $form->field($model, 'plan_check_manager_by')->dropDownList(\backend\models\User::getUserList()) ?>


        <?= $form->field($model, 'plan_check_time')->widget(
            \kartik\date\DatePicker::className(),
            [
                'name' => 'plan_check_time',
                'options' => [
                    'value' => !empty($model->plan_check_time) ? date('Y-m-d', $model->plan_check_time) : date('Y-m-d', time()),
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,]
            ]
        ) ?>

        <?= $form->field($model, 'check_by_id')->dropDownList(\backend\models\User::getUserList()) ?>
        <?= $form->field($model, 'check_result')->dropDownList(\common\models\LoanCarCheck::getCheckResult()) ?>


        <?= $form->field($model, 'check_time')->widget(
            \kartik\date\DatePicker::className(),
            [
                'name' => 'check_time',
                'options' => [
                    'value' => !empty($model->check_time) ? date('Y-m-d', $model->check_time) : date('Y-m-d', time()),
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,]
            ]
        ) ?>


        <?= $form->field($model, 'check_description')->textarea(['maxlength' => true, 'rows' => 5]) ?>

        <?= $form->field($model, 'check_longitude')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'check_latitude')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'audit_by')->dropDownList(\backend\models\User::getUserList()) ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

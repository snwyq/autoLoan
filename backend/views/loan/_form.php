<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Loan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'loan_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'province_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'area_id')->textInput() ?>

    <?= $form->field($model, 'apply_time')->textInput() ?>

    <?= $form->field($model, 'manager_id')->textInput() ?>

    <?= $form->field($model, 'money_channel_id')->textInput() ?>

    <?= $form->field($model, 'money_channel_product_id')->textInput() ?>

    <?= $form->field($model, 'loan_period_id')->textInput() ?>

    <?= $form->field($model, 'pay_type_id')->textInput() ?>

    <?= $form->field($model, 'apply_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audit_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_money_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_money_rate_add')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audit_at')->textInput() ?>

    <?= $form->field($model, 'audit_by')->textInput() ?>

    <?= $form->field($model, 'loan_use_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source_repayment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_in_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_in_account_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_in_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_in_bank_branch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_back_time')->textInput() ?>

    <?= $form->field($model, 'money_back_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_back_account_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_back_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_back_bank_branch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_back_status')->textInput() ?>

    <?= $form->field($model, 'loan_back_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'audit_remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

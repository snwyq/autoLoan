<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'loan_no') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'apply_time') ?>

    <?php // echo $form->field($model, 'manager_id') ?>

    <?php // echo $form->field($model, 'money_channel_id') ?>

    <?php // echo $form->field($model, 'money_channel_product_id') ?>

    <?php // echo $form->field($model, 'loan_period_id') ?>

    <?php // echo $form->field($model, 'pay_type_id') ?>

    <?php // echo $form->field($model, 'apply_money') ?>

    <?php // echo $form->field($model, 'audit_money') ?>

    <?php // echo $form->field($model, 'loan_money_rate') ?>

    <?php // echo $form->field($model, 'loan_money_rate_add') ?>

    <?php // echo $form->field($model, 'audit_at') ?>

    <?php // echo $form->field($model, 'audit_by') ?>

    <?php // echo $form->field($model, 'loan_use_to') ?>

    <?php // echo $form->field($model, 'source_repayment') ?>

    <?php // echo $form->field($model, 'money_in_account') ?>

    <?php // echo $form->field($model, 'money_in_account_name') ?>

    <?php // echo $form->field($model, 'money_in_bank') ?>

    <?php // echo $form->field($model, 'money_in_bank_branch') ?>

    <?php // echo $form->field($model, 'loan_back_time') ?>

    <?php // echo $form->field($model, 'money_back_account') ?>

    <?php // echo $form->field($model, 'money_back_account_name') ?>

    <?php // echo $form->field($model, 'money_back_bank') ?>

    <?php // echo $form->field($model, 'money_back_bank_branch') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'loan_back_status') ?>

    <?php // echo $form->field($model, 'loan_back_by') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'audit_remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

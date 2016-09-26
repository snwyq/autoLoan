<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanMakeloansCompensatorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-makeloans-compensatory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'makeloans_id') ?>

    <?= $form->field($model, 'pay_plan_id') ?>

    <?php // echo $form->field($model, 'money_back_time') ?>

    <?php // echo $form->field($model, 'money_end_time') ?>

    <?php // echo $form->field($model, 'money_back_money') ?>

    <?php // echo $form->field($model, 'overdue_days') ?>

    <?php // echo $form->field($model, 'overdue_prit') ?>

    <?php // echo $form->field($model, 'overdue_inst') ?>

    <?php // echo $form->field($model, 'overdue_penalty') ?>

    <?php // echo $form->field($model, 'is_repayment') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

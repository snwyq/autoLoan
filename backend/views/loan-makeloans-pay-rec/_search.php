<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanMakeloansPayRecSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-makeloans-pay-rec-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'plan_id') ?>

    <?= $form->field($model, 'makeloans_id') ?>

    <?php // echo $form->field($model, 'money_back_time') ?>

    <?php // echo $form->field($model, 'money_back_money') ?>

    <?php // echo $form->field($model, 'real_money_back_time') ?>

    <?php // echo $form->field($model, 'real_money_back_money') ?>

    <?php // echo $form->field($model, 'change_money') ?>

    <?php // echo $form->field($model, 'fine_money') ?>

    <?php // echo $form->field($model, 'is_repayment') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'pos_withhold') ?>

    <?php // echo $form->field($model, 'money_back_type') ?>

    <?php // echo $form->field($model, 'audit_by') ?>

    <?php // echo $form->field($model, 'audit_at') ?>

    <?php // echo $form->field($model, 'type') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

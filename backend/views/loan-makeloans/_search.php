<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanMakeloansSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-makeloans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'money_channel_id') ?>

    <?= $form->field($model, 'money_channel_product_id') ?>

    <?php // echo $form->field($model, 'give_money_time') ?>

    <?php // echo $form->field($model, 'loan_money') ?>

    <?php // echo $form->field($model, 'loan_term_id') ?>

    <?php // echo $form->field($model, 'loan_period_id') ?>

    <?php // echo $form->field($model, 'loan_money_rate') ?>

    <?php // echo $form->field($model, 'loan_rate_type_id') ?>

    <?php // echo $form->field($model, 'loan_pay_type_id') ?>

    <?php // echo $form->field($model, 'fixed_day') ?>

    <?php // echo $form->field($model, 'loan_start_time') ?>

    <?php // echo $form->field($model, 'loan_end_time') ?>

    <?php // echo $form->field($model, 'first_pay_date') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

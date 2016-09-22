<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloans */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'money_channel_id')->textInput() ?>

    <?= $form->field($model, 'money_channel_product_id')->textInput() ?>

    <?= $form->field($model, 'give_money_time')->textInput() ?>

    <?= $form->field($model, 'loan_money')->textInput() ?>

    <?= $form->field($model, 'loan_term_id')->textInput() ?>

    <?= $form->field($model, 'loan_period_id')->textInput() ?>

    <?= $form->field($model, 'loan_money_rate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_rate_type_id')->textInput() ?>

    <?= $form->field($model, 'loan_pay_type_id')->textInput() ?>

    <?= $form->field($model, 'fixed_day')->textInput() ?>

    <?= $form->field($model, 'loan_start_time')->textInput() ?>

    <?= $form->field($model, 'loan_end_time')->textInput() ?>

    <?= $form->field($model, 'first_pay_date')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

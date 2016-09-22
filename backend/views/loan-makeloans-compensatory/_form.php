<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansCompensatory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'makeloans_id')->textInput() ?>

    <?= $form->field($model, 'pay_plan_id')->textInput() ?>

    <?= $form->field($model, 'money_back_time')->textInput() ?>

    <?= $form->field($model, 'money_end_time')->textInput() ?>

    <?= $form->field($model, 'money_back_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'overdue_days')->textInput() ?>

    <?= $form->field($model, 'overdue_prit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'overdue_inst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'overdue_penalty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_repayment')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

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

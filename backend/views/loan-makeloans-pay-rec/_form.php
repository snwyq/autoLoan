<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansPayRec */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'plan_id')->textInput() ?>

    <?= $form->field($model, 'makeloans_id')->textInput() ?>

    <?= $form->field($model, 'money_back_time')->textInput() ?>

    <?= $form->field($model, 'money_back_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'real_money_back_time')->textInput() ?>

    <?= $form->field($model, 'real_money_back_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'change_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fine_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_repayment')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'pos_withhold')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money_back_type')->textInput() ?>

    <?= $form->field($model, 'audit_by')->textInput() ?>

    <?= $form->field($model, 'audit_at')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanMakeloansPayPlan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'makeloan_id')->textInput() ?>

    <?= $form->field($model, 'back_money_time')->textInput() ?>

    <?= $form->field($model, 'back_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urged_time')->textInput() ?>

    <?= $form->field($model, 'change_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'real_back_money_time')->textInput() ?>

    <?= $form->field($model, 'principal_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'interest_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remaining_money')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_overdual')->textInput() ?>

    <?= $form->field($model, 'manager_id')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attachment_num')->textInput() ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'is_compensatory')->textInput() ?>

    <?= $form->field($model, 'is_urged')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

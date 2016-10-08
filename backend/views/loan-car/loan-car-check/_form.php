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

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'car_id')->textInput() ?>

    <?= $form->field($model, 'check_class_id')->textInput() ?>

    <?= $form->field($model, 'check_type_id')->textInput() ?>

    <?= $form->field($model, 'plan_check_manager_by')->textInput() ?>

    <?= $form->field($model, 'plan_check_time')->textInput() ?>

    <?= $form->field($model, 'check_by_id')->textInput() ?>

    <?= $form->field($model, 'check_result')->textInput() ?>

    <?= $form->field($model, 'check_time')->textInput() ?>

    <?= $form->field($model, 'check_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audit_status')->textInput() ?>

    <?= $form->field($model, 'audit_by')->textInput() ?>

    <?= $form->field($model, 'audit_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

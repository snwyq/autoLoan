<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarChange */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class="col-md-6">
            <?= $form->field($model, 'change_no')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'car_id')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'min_change_money')->textInput() ?>
            <?= $form->field($model, 'car_audit_money')->textInput() ?>

        </div>

        <div class="col-md-12">

            <?= $form->field($model, 'remark')->textarea(['maxlength' => true, 'rows' => 5]) ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'manager_id')->textInput() ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'apply_time')->textInput() ?>
        </div>



        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

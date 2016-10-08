<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCarAssessControl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_id')->textInput() ?>

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'put_stor_time')->textInput() ?>

    <?= $form->field($model, 'put_stor_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'control_by_id')->textInput() ?>

    <?= $form->field($model, 'control_time')->textInput() ?>

    <?= $form->field($model, 'control_type')->textInput() ?>

    <?= $form->field($model, 'car_certificate_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'control_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transfer_person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transfer_telephone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transfer_card_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transfer_time')->textInput() ?>

    <?= $form->field($model, 'car_license_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'control_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'if_all_docment')->textInput() ?>

    <?= $form->field($model, 'car_condition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

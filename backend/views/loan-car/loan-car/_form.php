<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'loan_id')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'car_brand_id')->textInput() ?>

    <?= $form->field($model, 'car_series_id')->textInput() ?>

    <?= $form->field($model, 'car_model_id')->textInput() ?>

    <?= $form->field($model, 'car_displacement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_years')->textInput() ?>

    <?= $form->field($model, 'car_engine_model_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_vin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_outprice')->textInput() ?>

    <?= $form->field($model, 'car_start_time')->textInput() ?>

    <?= $form->field($model, 'car_out_time')->textInput() ?>

    <?= $form->field($model, 'car_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car_interior_color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'emission_standard')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

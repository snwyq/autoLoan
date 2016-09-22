<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanCarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-car-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'car_brand_id') ?>

    <?= $form->field($model, 'car_series_id') ?>

    <?php // echo $form->field($model, 'car_model_id') ?>

    <?php // echo $form->field($model, 'car_displacement') ?>

    <?php // echo $form->field($model, 'car_years') ?>

    <?php // echo $form->field($model, 'car_engine_model_name') ?>

    <?php // echo $form->field($model, 'car_vin') ?>

    <?php // echo $form->field($model, 'car_outprice') ?>

    <?php // echo $form->field($model, 'car_start_time') ?>

    <?php // echo $form->field($model, 'car_out_time') ?>

    <?php // echo $form->field($model, 'car_color') ?>

    <?php // echo $form->field($model, 'car_interior_color') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'emission_standard') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

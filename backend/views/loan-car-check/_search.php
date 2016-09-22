<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanCarCheckSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-car-check-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'check_class_id') ?>

    <?= $form->field($model, 'check_type_id') ?>

    <?php // echo $form->field($model, 'plan_check_manager_by') ?>

    <?php // echo $form->field($model, 'plan_check_time') ?>

    <?php // echo $form->field($model, 'check_by_id') ?>

    <?php // echo $form->field($model, 'check_result') ?>

    <?php // echo $form->field($model, 'check_time') ?>

    <?php // echo $form->field($model, 'check_description') ?>

    <?php // echo $form->field($model, 'check_longitude') ?>

    <?php // echo $form->field($model, 'check_latitude') ?>

    <?php // echo $form->field($model, 'audit_status') ?>

    <?php // echo $form->field($model, 'audit_by') ?>

    <?php // echo $form->field($model, 'audit_description') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

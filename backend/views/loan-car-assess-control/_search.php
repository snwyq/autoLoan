<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanCarAssessControlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-car-assess-control-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'car_id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'put_stor_time') ?>

    <?= $form->field($model, 'put_stor_reason') ?>

    <?php // echo $form->field($model, 'tag_code') ?>

    <?php // echo $form->field($model, 'car_owner') ?>

    <?php // echo $form->field($model, 'control_by_id') ?>

    <?php // echo $form->field($model, 'control_time') ?>

    <?php // echo $form->field($model, 'control_type') ?>

    <?php // echo $form->field($model, 'car_certificate_number') ?>

    <?php // echo $form->field($model, 'control_address') ?>

    <?php // echo $form->field($model, 'transfer_person') ?>

    <?php // echo $form->field($model, 'transfer_telephone') ?>

    <?php // echo $form->field($model, 'transfer_card_number') ?>

    <?php // echo $form->field($model, 'transfer_time') ?>

    <?php // echo $form->field($model, 'car_license_number') ?>

    <?php // echo $form->field($model, 'control_description') ?>

    <?php // echo $form->field($model, 'if_all_docment') ?>

    <?php // echo $form->field($model, 'car_condition') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

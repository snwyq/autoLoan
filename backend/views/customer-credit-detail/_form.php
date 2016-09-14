<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'money_channel_id')->textInput() ?>

    <?= $form->field($model, 'credit_money')->textInput() ?>

    <?= $form->field($model, 'product_class_main_money')->textInput() ?>

    <?= $form->field($model, 'product_class_part_money')->textInput() ?>

    <?= $form->field($model, 'directional_credit_money')->textInput() ?>

    <?= $form->field($model, 'immediately_credit_money')->textInput() ?>

    <?= $form->field($model, 'single_credit_money')->textInput() ?>

    <?= $form->field($model, 'credit_rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'supervision_mode')->textInput() ?>

    <?= $form->field($model, 'credit_period')->textInput() ?>

    <?= $form->field($model, 'combination_rate')->textInput() ?>

    <?= $form->field($model, 'inter_loan_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_time')->textInput() ?>

    <?= $form->field($model, 'end_time')->textInput() ?>

    <?= $form->field($model, 'condition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

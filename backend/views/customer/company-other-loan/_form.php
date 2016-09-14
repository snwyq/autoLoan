<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyOtherLoan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'loan_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_remainder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_time')->textInput() ?>

    <?= $form->field($model, 'end_time')->textInput() ?>

    <?= $form->field($model, 'loan_type_id')->textInput() ?>

    <?= $form->field($model, 'overdue_num')->textInput() ?>

    <?= $form->field($model, 'loan_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_type_by')->textInput() ?>

    <?= $form->field($model, 'sued_flag')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyOtherLoanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-other-loan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'loan_name') ?>

    <?= $form->field($model, 'loan_num') ?>

    <?= $form->field($model, 'loan_remainder') ?>

    <?php // echo $form->field($model, 'start_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'loan_type_id') ?>

    <?php // echo $form->field($model, 'overdue_num') ?>

    <?php // echo $form->field($model, 'loan_bank') ?>

    <?php // echo $form->field($model, 'loan_type_by') ?>

    <?php // echo $form->field($model, 'sued_flag') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

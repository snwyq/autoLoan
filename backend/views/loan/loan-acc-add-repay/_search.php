<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\LoanMakeloansPayPlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-makeloans-pay-plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'loan_id') ?>

    <?= $form->field($model, 'makeloan_id') ?>

    <?= $form->field($model, 'back_money_time') ?>

    <?php // echo $form->field($model, 'back_money') ?>

    <?php // echo $form->field($model, 'urged_time') ?>

    <?php // echo $form->field($model, 'change_money') ?>

    <?php // echo $form->field($model, 'real_back_money_time') ?>

    <?php // echo $form->field($model, 'principal_money') ?>

    <?php // echo $form->field($model, 'interest_money') ?>

    <?php // echo $form->field($model, 'remaining_money') ?>

    <?php // echo $form->field($model, 'is_overdual') ?>

    <?php // echo $form->field($model, 'manager_id') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'attachment_num') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_compensatory') ?>

    <?php // echo $form->field($model, 'is_urged') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

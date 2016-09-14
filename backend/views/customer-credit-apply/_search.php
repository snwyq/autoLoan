<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CustomerCreditApplySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-credit-apply-search">



    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'apply_no') ?>

    <?= $form->field($model, 'province_id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'apply_time') ?>

    <?php // echo $form->field($model, 'apply_manager_id') ?>

    <?php // echo $form->field($model, 'customer_class') ?>

    <?php // echo $form->field($model, 'apply_type_id') ?>

    <?php // echo $form->field($model, 'old_credit_money') ?>

    <?php // echo $form->field($model, 'to_credit_money') ?>

    <?php // echo $form->field($model, 'money_channel_id') ?>

    <?php // echo $form->field($model, 'apply_money') ?>

    <?php // echo $form->field($model, 'audit_money') ?>

    <?php // echo $form->field($model, 'audit_rate') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'status_remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

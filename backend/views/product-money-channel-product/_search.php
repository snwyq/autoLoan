<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProductMoneyChannelProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-money-channel-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'money_channel_id') ?>

    <?= $form->field($model, 'product_class_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'name_alias') ?>

    <?php // echo $form->field($model, 'cost_rate_day') ?>

    <?php // echo $form->field($model, 'cost_rate_month') ?>

    <?php // echo $form->field($model, 'cost_rate_year') ?>

    <?php // echo $form->field($model, 'sale_rate_day') ?>

    <?php // echo $form->field($model, 'sale_rate_month') ?>

    <?php // echo $form->field($model, 'sale_rate_year') ?>

    <?php // echo $form->field($model, 'max_rate_add') ?>

    <?php // echo $form->field($model, 'min_rate_add') ?>

    <?php // echo $form->field($model, 'rate_type') ?>

    <?php // echo $form->field($model, 'pay_period_var') ?>

    <?php // echo $form->field($model, 'pay_type_var') ?>

    <?php // echo $form->field($model, 'fixed_day') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'fine_grace_days') ?>

    <?php // echo $form->field($model, 'fine_coefficient') ?>

    <?php // echo $form->field($model, 'inerest_type') ?>

    <?php // echo $form->field($model, 'money_type_id') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

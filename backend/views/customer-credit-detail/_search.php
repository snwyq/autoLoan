<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CustomerCreditDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-credit-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options'=>['class'=>'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'money_channel_id') ?>

    <?= $form->field($model, 'credit_money') ?>

    <?= $form->field($model, 'product_class_main_money') ?>

    <?php // echo $form->field($model, 'product_class_part_money') ?>

    <?php // echo $form->field($model, 'directional_credit_money') ?>

    <?php // echo $form->field($model, 'immediately_credit_money') ?>

    <?php // echo $form->field($model, 'single_credit_money') ?>

    <?php // echo $form->field($model, 'credit_rating') ?>

    <?php // echo $form->field($model, 'supervision_mode') ?>

    <?php // echo $form->field($model, 'credit_period') ?>

    <?php // echo $form->field($model, 'combination_rate') ?>

    <?php // echo $form->field($model, 'inter_loan_limit') ?>

    <?php // echo $form->field($model, 'start_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <?php // echo $form->field($model, 'condition') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

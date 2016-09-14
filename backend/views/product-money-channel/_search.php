<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProductMoneyChannelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-money-channel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'contacts_name') ?>

    <?= $form->field($model, 'contacts_phone') ?>

    <?php // echo $form->field($model, 'company_type_id') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'begin_time') ?>

    <?php // echo $form->field($model, 'end_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

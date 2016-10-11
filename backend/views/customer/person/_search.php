<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">


    <?php
    //Yii::$container->set(\yii\widgets\ActiveField::className(), ['template' => "{label}\n{input}\n{hint}"]);
    $form = ActiveForm::begin([
        'action' => ['person'],
        'method' => 'get',
        'options' => ['class' => 'form-inline'],
    ]); ?>



    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'company_name') ?>

    <?php // echo $form->field($model, 'link_name') ?>

    <?php // echo $form->field($model, 'card_number') ?>

    <?php // echo $form->field($model, 'card_address') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'city_proper_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'src_id') ?>

    <?php // echo $form->field($model, 'manager_id') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'block_at') ?>

    <?php // echo $form->field($model, 'confirmed_at') ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
        <div class="help-block"></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

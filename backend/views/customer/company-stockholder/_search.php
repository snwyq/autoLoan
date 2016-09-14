<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyStockholderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-stockholder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'capital_amount') ?>

    <?= $form->field($model, 'reality_amount') ?>

    <?php // echo $form->field($model, 'investment_type') ?>

    <?php // echo $form->field($model, 'card_number') ?>

    <?php // echo $form->field($model, 'investment_rate') ?>

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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AutoModelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auto-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'model_id') ?>

    <?= $form->field($model, 'model_name') ?>

    <?= $form->field($model, 'brand_id') ?>

    <?= $form->field($model, 'series_id') ?>

    <?php // echo $form->field($model, 'model_price') ?>

    <?php // echo $form->field($model, 'liter') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

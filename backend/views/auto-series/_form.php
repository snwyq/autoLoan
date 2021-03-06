<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AutoSeries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'series_id')->textInput() ?>

    <?= $form->field($model, 'series_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'series_group_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

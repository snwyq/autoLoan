<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NavItem */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="Nav-item-form">

    <?php $form = ActiveForm::begin(); ?>
            <?php echo $form->errorSummary($model) ?>

            <?php echo $form->field($model, 'title') ?>

            <?php echo $form->field($model, 'url')->textarea(['maxlength' => 1024]) ?>

            <?php echo $form->field($model, 'status')->checkbox() ?>

            <div class="form-group">
                <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

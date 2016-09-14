<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMoneyChannelProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'money_channel_id')->dropDownList(\common\models\ProductMoneyChannel::getMoneychannel()) ?>

    <?= $form->field($model, 'product_class_id')->dropDownList(\common\models\ProductClass::getProductList()) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost_rate_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost_rate_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost_rate_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sale_rate_day')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sale_rate_month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sale_rate_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_rate_add')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_rate_add')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_type')->textInput() ?>

    <?= $form->field($model, 'pay_period_var')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pay_type_var')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fixed_day')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'fine_grace_days')->textInput() ?>

    <?= $form->field($model, 'fine_coefficient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inerest_type')->textInput() ?>

    <?= $form->field($model, 'money_type_id')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

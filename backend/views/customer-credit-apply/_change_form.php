<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditApply */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'apply_type_id')->label("申请类型")->dropDownList(\common\models\CustomerCreditApply::getCreditType(), ['disabled' => 'disable']); ?>

        <?= $form->field($model, 'apply_no')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'customer_id')->dropDownList(\common\models\Customer::getCustomerList())->hint("一个贷款人只需要授信申请一次，列出来的是未授信过的！") ?>


        <?= $form->field($model, 'area_id')->label('提报城市')->widget(\common\modules\city\widgets\CityWidget::className(), [
            'provinceAttribute' => 'province_id',
            'cityAttribute' => 'city_id',
            'areaAttribute' => 'area_id'
        ]) ?>


        <?= $form->field($model, 'apply_time')->widget(
            DatePicker::className(),
            [
                'name' => 'event_time',
                'value' => '12/31/2010',
                'options' => ['placeholder' => ''],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy/mm/dd',
                    'todayHighlight' => true, ]
            ]
        ) ?>



        <?= $form->field($model, 'apply_manager_id')->textInput() ?>

        <?= $form->field($model, 'customer_class')->textInput() ?>


        <?= $form->field($model, 'old_credit_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'to_credit_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'money_channel_id')->textInput() ?>

        <?= $form->field($model, 'apply_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'audit_money')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'audit_rate')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



        <?= $form->field($model, 'old_credit_begin')->textInput() ?>
        <?= $form->field($model, 'old_credit_end')->textInput() ?>
        <?= $form->field($model, 'to_credit_begin')->textInput() ?>
        <?= $form->field($model, 'to_credit_end')->textInput() ?>



        <?= $form->field($model, 'order')->textInput() ?>

        <?= $form->field($model, 'company_id')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

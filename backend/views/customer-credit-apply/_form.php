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


        <div class="col-xs-6 col-md-6 well">
            <?= $form->field($model, 'apply_type_id')->label("申请类型")->dropDownList(\common\models\CustomerCreditApply::getCreditType(), ['disabled' => 'disable']); ?>
            <?= $form->field($model, 'customer_id')->label('授信人')->dropDownList(\common\models\Customer::getCustomerList()) ?>
        </div>

        <div class="col-xs-6 col-md-6 well">
            <?= $form->field($model, 'apply_no')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'area_id')->label('提报城市')->widget(\common\modules\city\widgets\CityWidget::className(), [
                'provinceAttribute' => 'province_id',
                'cityAttribute' => 'city_id',
                'areaAttribute' => 'area_id'
            ]) ?>
        </div>

        <?php if ($model->scenario == "addCredit")   : ?>

            <div class="col-xs-12 col-md-12 well" style="display: block">
                <div class="col-xs-6 col-md-6 ">
                    <?= $form->field($model, 'apply_money')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-6 col-md-6 ">
                    <?= $form->field($model, 'apply_rate')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
        <?php endif; ?>

        <?php if ($model->scenario == "changeCredit")   : ?>


            <div class="col-xs-12 col-md-12 well">
                <div class="col-md-6">
                    <?= $form->field($model, 'money_channel_id')->dropDownList(\common\models\ProductMoneyChannel::getMoneychannel()) ?>
                </div>

                <div class="col-xs-12 col-md-12">
                    <div class="col-md-6">
                        <?= $form->field($model, 'old_credit_money')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'to_credit_money')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($model->scenario == "goonCredit")    : ?>

            <div class="col-xs-12 col-md-12 well">
                <div class="col-md-6" style="display: block">
                    <?= $form->field($model, 'money_channel_id')->dropDownList(\common\models\ProductMoneyChannel::getMoneychannel()) ?>
                </div>

                <div class="col-xs-12 col-md-12" style="display: block">
                    <div class="col-md-6">
                        <?= $form->field($model, 'old_credit_begin')->textInput() ?>
                        <?= $form->field($model, 'old_credit_end')->textInput() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'to_credit_begin')->textInput() ?>
                        <?= $form->field($model, 'to_credit_end')->textInput() ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <div class="col-xs-12 col-md-12 well" style="display: block">
            <div class="col-xs-12 col-md-12 ">

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>

        <?= $form->field($model, 'apply_time')->widget(
            \kartik\datetime\DateTimePicker::className(),
            [
                'type' => 2,
                'options' => [
                    'value' => !empty($model->apply_time) ? date('Y-m-d', $model->apply_time) : date('Y-m-d', empty($model->created_at)?time():$model->created_at),
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]
        ) ?>

        <?= $form->field($model, 'apply_manager_id')->dropDownList(\backend\models\User::getUserList()) ?>


        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>


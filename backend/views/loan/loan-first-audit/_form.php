<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Loan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <fieldset disabled>
            <div class="col-xs-6 col-md-6 well">

                <?= $form->field($model, 'customer_id')->dropDownList(\common\models\Customer::getCustomerList()) ?>

                <?= $form->field($model, 'area_id')->label('提报城市')->widget(\common\modules\city\widgets\CityWidget::className(), [
                    'provinceAttribute' => 'province_id',
                    'cityAttribute' => 'city_id',
                    'areaAttribute' => 'area_id'
                ]) ?>

            </div>

            <div class="col-xs-6 col-md-6 well">
                <?= $form->field($model, 'loan_no')->textInput() ?>
                <?= $form->field($model, 'apply_time')->textInput() ?>
            </div>


            <div class="col-md-12 well">

                <div class="col-xs-6 col-md-6 ">

                    <?= $form->field($model, 'money_channel_id')->dropDownList(\common\models\ProductMoneyChannel::getMoneychannel()) ?>
                    <?= $form->field($model, 'money_channel_product_id')->dropDownList(\common\models\ProductMoneyChannelProduct::getMoneychannelProduct()) ?>

                    <?= $form->field($model, 'loan_period_id')->dropDownList(Yii::$app->config->get('LOAN_PERIRD_LIST')) ?>
                    <?= $form->field($model, 'pay_type_id')->dropDownList(Yii::$app->config->get('LOAN_REPAY_TYPE')) ?>

                </div>

                <div class="col-xs-6 col-md-6 ">
                    <?= $form->field($model, 'apply_money')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'loan_money_rate')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'loan_money_rate_add')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-xs-12 col-md-12 ">
                    <?= $form->field($model, 'loan_use_to')->textarea(['maxlength' => true]) ?>
                    <?= $form->field($model, 'source_repayment')->textarea(['maxlength' => true]) ?>
                </div>

            </div>


            <div class="col-xs-6 col-md-6 well">

                <?= $form->field($model, 'money_in_account')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'money_in_account_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'money_in_bank')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'money_in_bank_branch')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-xs-6 col-md-6 well">
                <?= $form->field($model, 'money_back_account')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'money_back_account_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'money_back_bank')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'money_back_bank_branch')->textInput(['maxlength' => true]) ?>

            </div>


            <div class="col-md-12 well">

                <div class="col-xs-6 col-md-6 ">

                    <?= $form->field($model, 'manager_id')->textInput() ?>
                </div>

                <div class="col-xs-6 col-md-6 ">

                    <?= $form->field($model, 'created_by')->dropDownList(\backend\models\User::getUserList())?>

                </div>
                <div class="col-md-12 col-xs-12">
                    <?= $form->field($model, 'remark')->textarea(['maxlength' => true]) ?>
                </div>
            </div>
        </fieldset>

        <div class="col-md-12 well">

            <div class="col-xs-6 col-md-6 ">
                <?= $form->field($model, 'audit_money')->textInput() ?>
            </div>

            <div class="col-xs-6 col-md-6 ">

                <?= $form->field($model, 'audit_by')->dropDownList(\backend\models\User::getUserList())?>

            </div>
            <div class="col-md-12 col-xs-12">
                <?= $form->field($model, 'audit_remark')->textarea(['maxlength' => true]) ?>
            </div>

            <div class="col-md-12 col-xs-12">
                <?= $form->field($model,'status')->radioList(['2'=>'提交未审批','3'=>'初审通过','-10'=>'否决'])->label('审批结果'); ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'first-audit-pdate') : Yii::t('app', '审批完成'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
            </div>
        </div>




        <?php ActiveForm::end(); ?>
    </div>


</div>

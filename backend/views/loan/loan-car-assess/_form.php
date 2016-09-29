<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LoanCar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class=" col-md-12  well">

            <div class="col-md-6">


                <?= $form->field($model, 'car_series_id')->label('车辆')->widget(\common\modules\auto\widgets\AutoWidget::className(), [
                    'brandAttribute' => 'car_brand_id',
                    'seriesAttribute' => 'car_series_id',
                    'modelAttribute' => 'car_model_id'
                ]) ?>



                <?= $form->field($model, 'car_engine_model_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'car_vin')->textInput(['maxlength' => true]) ?>


            </div>
            <div class="col-md-3">
                <?= $form->field($model, 'car_start_time')->widget(
                    \kartik\date\DatePicker::className(),
                    [
                        'name' => 'first_plate_date',
                        'options' => [
                            'value' => !empty($model->car_start_time) ? date('Y-m-d', $model->car_start_time) : date('Y-m-d', time()),
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,]
                    ]
                ) ?>


                <?= $form->field($model, 'car_out_time')->widget(
                    \kartik\date\DatePicker::className(),
                    [
                        'name' => 'first_plate_date',
                        'options' => [
                            'value' => !empty($model->car_out_time) ? date('Y-m-d', $model->car_out_time) : date('Y-m-d', time()),
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,]
                    ]
                ) ?>


                <?= $form->field($model, 'emission_standard')->dropDownList(Yii::$app->config->get('CAR_EMISSION_STANDARD')) ?>


            </div>

            <div class="col-md-3">

                <?= $form->field($model, 'car_displacement')->textInput(['maxlength' => true]) ?>


                <?= $form->field($model, 'car_interior_color')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'car_color')->textInput(['maxlength' => true]) ?>

            </div>

        </div>


        <div class=" col-md-12  well">

            <div class="">
                <h4>评估内容</h4>
            </div>

            <div class="col-md-4">
                <?php if ($model->isNewRecord)  : ?>
                    <?php $assessmodel->fire_car_flag = '否'; ?>
                    <?php $assessmodel->car_water_flag = '否'; ?>
                    <?php $assessmodel->car_surface = '良好'; ?>
                    <?php $assessmodel->car_interior = '良好'; ?>
                    <?php $assessmodel->car_engine = '良好'; ?>
                    <?php $assessmodel->car_malfunction = '否'; ?>
                    <?php $assessmodel->car_condition = '是'; ?>
                    <?php $assessmodel->car_checking_grade = 'B'; ?>

                <?php endif; ?>






                <?= $form->field($assessmodel, 'first_plate_date')->widget(
                    \kartik\date\DatePicker::className(),
                    [
                        'name' => 'first_plate_date',
                        'options' => [
                            'value' => !empty($assessmodel->first_plate_date) ? date('Y-m-d', $assessmodel->first_plate_date) : date('Y-m-d', time()),
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,]
                    ]
                ) ?>


                <?= $form->field($assessmodel, 'car_yearly_check_due_time')->widget(
                    \kartik\date\DatePicker::className(),
                    [
                        'name' => 'car_yearly_check_due_time',
                        'options' => [
                            'value' => !empty($assessmodel->car_yearly_check_due_time) ? date('Y-m-d', $assessmodel->car_yearly_check_due_time) : date('Y-m-d', time()),
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,]
                    ]
                ) ?>





                <?= $form->field($assessmodel, 'car_insurance_due_time')->widget(
                    \kartik\date\DatePicker::className(),
                    [
                        'name' => 'car_insurance_due_time',
                        'options' => [
                            'value' => !empty($assessmodel->car_insurance_due_time) ? date('Y-m-d', $assessmodel->car_insurance_due_time) : date('Y-m-d', time()),
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,]
                    ]
                ) ?>



                <?= $form->field($assessmodel, 'fire_car_flag')->radioList(['是' => '是', '否' => '否']) ?>

                <?= $form->field($assessmodel, 'car_water_flag')->radioList(['是' => '是', '否' => '否']) ?>


                <?= $form->field($assessmodel, 'car_surface')->textInput(['maxlength' => true])->radioList(['良好' => '良好', '正常' => '正常', '较差' => '轻差']) ?>

                <?= $form->field($assessmodel, 'car_interior')->textInput(['maxlength' => true])->radioList(['良好' => '良好', '正常' => '正常', '较差' => '轻差']) ?>

                <?= $form->field($assessmodel, 'car_engine')->textInput(['maxlength' => true])->radioList(['良好' => '良好', '正常' => '正常', '较差' => '轻差']) ?>

                <?= $form->field($assessmodel, 'car_malfunction')->radioList(['是' => '是', '否' => '否']) ?>

                <?= $form->field($assessmodel, 'car_condition')->textInput(['maxlength' => true])->radioList(['是' => '是', '否' => '否']) ?>


            </div>
            <div class="col-md-4">

                <?= $form->field($assessmodel, 'car_use')->textInput(['maxlength' => true])->dropDownList(['非营动' => '非营运', '营运' => '营运', '其它' => '其它']) ?>
                <?= $form->field($assessmodel, 'car_change_num')->textInput(['value' => 0]) ?>


                <?= $form->field($assessmodel, 'car_mileage')->textInput() ?>

                <?= $form->field($assessmodel, 'car_owner')->textInput(['maxlength' => true]) ?>
                <?= $form->field($assessmodel, 'car_insurance_due_description')->textarea(['maxlength' => true, 'rows' => 3]) ?>


                <?= $form->field($assessmodel, 'car_description')->textarea(['rows' => 6]) ?>


            </div>


            <div class="col-md-4 well">

                <h5>评估结果</h5>
                <?= $form->field($assessmodel, 'car_checking_grade')->textInput(['maxlength' => true])->radioList(['A' => 'A', 'A+' => 'A+', 'B' => 'B', 'B+' => 'B+', 'C' => 'C', 'D' => 'D']) ?>

                <?= $form->field($assessmodel, 'assess_money')->textInput(['maxlength' => true]) ?>


                <?= $form->field($assessmodel, 'assess_discount')->textInput(['value' => '0.70']) ?>



                <?= $form->field($assessmodel, 'assess_loan_money')->textInput(['maxlength' => true]) ?>

                <?= $form->field($assessmodel, 'assess_by')->dropDownList(\backend\models\User::getUserList()) ?>




                <?= $form->field($assessmodel, 'assess_at')->widget(
                    \kartik\date\DatePicker::className(),
                    [
                        'name' => 'assess_at',
                        'options' => [
                            'value' => !empty($assessmodel->assess_at) ? date('Y-m-d', $assessmodel->assess_at) : date('Y-m-d', time()),
                        ],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true,]
                    ]
                ) ?>


            </div>
        </div>


        <?php if ($model->scenario == "audit")  : ?>

            <div class=" col-md-12  well">

                <div class="col-md-6">

                    <?= $form->field($assessmodel, 'audit_assess_money')->textInput() ?>

                    <?= $form->field($assessmodel, 'audit_discount')->textInput(['value' => '0.70']) ?>

                    <?= $form->field($assessmodel, 'audit_loan_money')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($assessmodel, 'aduit_at')->textInput() ?>

                    <?= $form->field($assessmodel, 'audit_by')->textInput() ?>


                </div>

                <div class="col-md-6">
                    <?= $form->field($assessmodel, 'audit_remark')->textarea(['rows' => 6]) ?>

                    <?= $form->field($assessmodel, 'new_auto_price')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($assessmodel, 'bigdata_price_1')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($assessmodel, 'bigdata_price_2')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($assessmodel, 'bigdata_price_3')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

        <?php endif; ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

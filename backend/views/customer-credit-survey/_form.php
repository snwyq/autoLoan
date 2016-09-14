<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditSurvey */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apply_id')->textInput() ?>

    <?= $form->field($model, 'suvey_by')->textInput() ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'oldcustomer_flag')->textInput() ?>

    <?= $form->field($model, 'overdue_flag')->textInput() ?>

    <?= $form->field($model, 'card_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'live_desp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auto_work_year_id')->textInput() ?>

    <?= $form->field($model, 'family_net_assets')->textInput() ?>

    <?= $form->field($model, 'total_liabilities')->textInput() ?>

    <?= $form->field($model, 'from_other_biz_money')->textInput() ?>

    <?= $form->field($model, 'month_sales_amount')->textInput() ?>

    <?= $form->field($model, 'month_stock_num')->textInput() ?>

    <?= $form->field($model, 'growth_in_sales')->textInput() ?>

    <?= $form->field($model, 'sales_profit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'turnover_days')->textInput() ?>

    <?= $form->field($model, 'turnover_days_min')->textInput() ?>

    <?= $form->field($model, 'forecasts_growth')->textInput() ?>

    <?= $form->field($model, 'credit_desp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'biz_desp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'financing_purpose')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'other_purpose')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'investigation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_Lease_contract_flag')->textInput() ?>

    <?= $form->field($model, 'industry_experience_flag')->textInput() ?>

    <?= $form->field($model, 'second_hand_car_experience_flag')->textInput() ?>

    <?= $form->field($model, 'bad_credit_flag')->textInput() ?>

    <?= $form->field($model, 'cars_stop_number')->textInput() ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

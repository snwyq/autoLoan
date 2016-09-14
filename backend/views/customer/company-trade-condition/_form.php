<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyTradeCondition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-body">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'month')->textInput() ?>

    <?= $form->field($model, 'trade_count')->textInput() ?>

    <?= $form->field($model, 'trade_money')->textInput() ?>

    <?= $form->field($model, 'trade_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trade_profit_margin')->textInput() ?>

    <?= $form->field($model, 'sell_num')->textInput() ?>

    <?= $form->field($model, 'sell_money')->textInput() ?>

    <?= $form->field($model, 'stock_money')->textInput() ?>

    <?= $form->field($model, 'sell_condition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buy_condition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-flat btn-block' : 'btn btn-primary btn-flat block']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>

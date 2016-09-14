<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyTradeConditionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-trade-condition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'month') ?>

    <?= $form->field($model, 'trade_count') ?>

    <?php // echo $form->field($model, 'trade_money') ?>

    <?php // echo $form->field($model, 'trade_cost') ?>

    <?php // echo $form->field($model, 'trade_profit_margin') ?>

    <?php // echo $form->field($model, 'sell_num') ?>

    <?php // echo $form->field($model, 'sell_money') ?>

    <?php // echo $form->field($model, 'stock_money') ?>

    <?php // echo $form->field($model, 'sell_condition') ?>

    <?php // echo $form->field($model, 'buy_condition') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

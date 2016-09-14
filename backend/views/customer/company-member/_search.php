<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CompanyMemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'card_number') ?>

    <?= $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'other_link_type') ?>

    <?php // echo $form->field($model, 'role_type') ?>

    <?php // echo $form->field($model, 'sex_id') ?>

    <?php // echo $form->field($model, 'educational_id') ?>

    <?php // echo $form->field($model, 'work_position') ?>

    <?php // echo $form->field($model, 'is_work_contacts') ?>

    <?php // echo $form->field($model, 'address') ?>

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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PersonProfileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="person-profile-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'sex_id') ?>

    <?= $form->field($model, 'nation') ?>

    <?php // echo $form->field($model, 'card_type_id') ?>

    <?php // echo $form->field($model, 'card_number') ?>

    <?php // echo $form->field($model, 'card_province_id') ?>

    <?php // echo $form->field($model, 'card_city_id') ?>

    <?php // echo $form->field($model, 'card_area_id') ?>

    <?php // echo $form->field($model, 'card_address') ?>

    <?php // echo $form->field($model, 'province_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'educational_id') ?>

    <?php // echo $form->field($model, 'marriage_type_id') ?>

    <?php // echo $form->field($model, 'houseflag') ?>

    <?php // echo $form->field($model, 'carflag') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'birth') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'work_years') ?>

    <?php // echo $form->field($model, 'auto_work_year_id') ?>

    <?php // echo $form->field($model, 'work_position_id') ?>

    <?php // echo $form->field($model, 'income') ?>

    <?php // echo $form->field($model, 'company_id') ?>

    <?php // echo $form->field($model, 'company_name') ?>

    <?php // echo $form->field($model, 'company_address') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'other_contact') ?>

    <?php // echo $form->field($model, 'other_phone') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'manager_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'order') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default btn-flat']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

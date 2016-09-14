<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyProfile */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Company Profile',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Company Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="company-profile-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

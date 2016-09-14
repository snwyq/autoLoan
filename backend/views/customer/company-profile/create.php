<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CompanyProfile */

$this->title = Yii::t('app', 'Create Company Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Company Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-profile-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

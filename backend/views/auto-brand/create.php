<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AutoBrand */

$this->title = Yii::t('app', 'Create Auto Brand');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-brand-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductClass */

$this->title = Yii::t('app', 'Create Product Class');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Classes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-class-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

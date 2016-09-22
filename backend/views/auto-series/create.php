<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AutoSeries */

$this->title = Yii::t('app', 'Create Auto Series');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Series'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-series-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

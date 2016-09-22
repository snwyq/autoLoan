<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AutoModel */

$this->title = Yii::t('app', 'Create Auto Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Auto Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auto-model-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

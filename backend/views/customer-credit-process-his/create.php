<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CustomerCreditProcessHis */

$this->title = Yii::t('app', 'Create Customer Credit Process His');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customer Credit Process His'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-credit-process-his-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Loan */

$this->title = Yii::t('app', 'Create Loan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

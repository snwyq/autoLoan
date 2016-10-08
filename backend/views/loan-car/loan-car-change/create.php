<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LoanCarChange */

$this->title = Yii::t('app', '车辆置换申请');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Loan Car Changes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loan-car-change-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

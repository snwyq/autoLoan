<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = Yii::t('app', '新增借款企业');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款企业列表'), 'url' => ['customer/company']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

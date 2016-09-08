<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款人列表'), 'url' => ['customer/person']];
$this->params['breadcrumbs'][] = ['label' => $model->name];


?>


<?php $this->beginContent("@backend/views/customer/layoutperson.php", ['customer' => $customer]) ?>


<?= $this->render('_form', ['model' => $model]) ?>


<?php $this->endContent() ?>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonProfile */
$this->title = Yii::t('app', '客户档案');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款人列表'), 'url' => ['customer/person']];
$this->params['breadcrumbs'][] = $this->title;
?>



<?php $this->beginContent("@backend/views/customer/layoutperson.php", ['customer' => $customer]) ?>


<?= $this->render('_form', ['model' => $model]) ?>


<?php $this->endContent() ?>
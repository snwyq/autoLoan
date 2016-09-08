<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PersonFamilyMember */
$this->title = Yii::t('app', '修改家庭成员');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '家庭成员'), 'url' => ['customer/family-member-list','id'=>$customer->id]];
$this->params['breadcrumbs'][] = $this->title;

?>


<?php $this->beginContent("@backend/views/customer/layoutperson.php", ['customer' => $customer]) ?>


<?= $this->render('_form', ['model' => $model]) ?>


<?php $this->endContent() ?>
<
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PersonWork */

$this->title = Yii::t('app', '企业变更历史');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '变更历史'), 'url' => ['customer/change-history-list','id'=>$customer->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>


<?= $this->render('_form', ['model' => $model]) ?>


<?php $this->endContent() ?>

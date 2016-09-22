<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

//$this->title = Yii::t('app', 'Update {modelClass}: ', [
//    'modelClass' => 'Customer',
//]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '授信申请列表'), 'url' => ['credit-add-list']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>




<?php $this->beginContent("@backend/views/customer-credit-apply/layoutapply.php", ['customer' => $customer,'model'=>$model]) ?>

<?php $form = ActiveForm::begin(); ?>

<?= $this->render('_form', ['form' => $form, 'model' => $model]) ?>


<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
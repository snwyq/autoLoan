<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

//$this->title = Yii::t('app', 'Update {modelClass}: ', [
//    'modelClass' => 'Customer',
//]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>




<?php $this->beginContent("@backend/views/customer/layout.php", ['customer' => $customer]) ?>

<?php $form = ActiveForm::begin(); ?>

<?= $this->render('_form', ['form' => $form, 'model' => $model]) ?>

    <div class="form-group">
        <?= Html::submitButton( Yii::t('app', 'Update'), ['class' => 'btn bg-maroon btn-flat btn-block']) ?>
    </div>

<?php ActiveForm::end(); ?>

<?php $this->endContent() ?>
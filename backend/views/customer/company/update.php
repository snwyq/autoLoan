<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '借款企业列表'), 'url' => ['customer/company']];
$this->params['breadcrumbs'][] = ['label' => $model->name];


?>
<?php $this->beginContent("@backend/views/customer/layoutcompany.php", ['customer' => $customer]) ?>

<?= $this->render('_form', ['model' => $model]) ?>


<?php $this->endContent() ?>

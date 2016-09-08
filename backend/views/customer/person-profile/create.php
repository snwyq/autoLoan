<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PersonProfile */

$this->title = Yii::t('app', '家庭成员');
$this->title = Yii::t('app', 'Create Person Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Person Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-profile-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

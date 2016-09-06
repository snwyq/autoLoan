<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/6/1
 * Time: 下午1:53
 */
use common\helpers\Html;
use yii\helpers\Url;
?>

<div class="media-left">
    <a href="<?= Url::to(['/user/default/index', 'id' => $model->user_id]) ?>" rel="author">
        <?= Html::img($model->user->getAvatar(), ['class' => 'media-object', 'alt' => $model->user->username]) ?>
    </a>
</div>
<div class="media-body">
    <div class="media-heading">
        <a href="<?= Url::to(['/user/default/index', 'id' => $model->user_id]) ?>" rel="author"><?= $model->user->username ?></a>
        <em>NO. <i><?= $index + 1 ?></i></em>
    </div>
    <div class="media-content">
        签到时间：<i><?= Yii::$app->formatter->asTime($model->last_sign_at) ?></i><br />
        连续签到：<i><?= $model->continue_times ?></i>天
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 15/12/25
 * Time: 下午8:57.
 */
$this->title = '我的发布';
$this->params['breadcrumbs'][] = $this->title;
/* @var $this \yii\web\View */
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?= $this->render('../_menu') ?>
        </div>
        <div class="col-md-9">
            <ul class="post-list">
                <?php foreach ($models as $key => $item):?>
                    <li>
                        <a href="<?php if ($item->status == 1):?><?=\yii\helpers\Url::to(['/article/view', 'id' => $item->id])?><?php else:?><?=\yii\helpers\Url::to(['/user/update-article', 'id' => $item->id])?><?php endif;?>"><?=$item->title?></a>
                        <span class="pull-right"><?php if ($item->status == 1):?>审核通过<?php elseif ($item->status == 0):?>待审核<?php else :?>未审核通过<?php endif;?></span>
                    </li>
                <?php endforeach;?>
            </ul>
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </div>
    </div>
</div>


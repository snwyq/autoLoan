<a href="<?=\yii\helpers\Url::to(['/article/view', 'id' => $model->article->id])?>"><?=$model->article->title?></a>
<?= \common\helpers\Html::a('取消', ['/favourite'], [
    'data' => [
        'method' => 'post',
        'ajax' => 1,
        'params' => [
            'id' => $model->article->id
        ],
        'confirm' => '确定要取消收藏吗?',
    ],
    'class' => 'text-danger pull-right'
])?>
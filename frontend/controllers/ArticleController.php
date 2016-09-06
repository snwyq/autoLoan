<?php
/**
 * author: yidashi
 * Date: 2015/11/27
 * Time: 11:54.
 */
namespace frontend\controllers;

use common\models\Comment;
use frontend\models\Tag;
use frontend\models\Article;
use common\models\Category;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ArticleController extends Controller
{
    /**
     * 分类文章列表
     */
    public function actionIndex($cate = null)
    {
        $query = Article::find()->published();
        $category = null;
        if (!empty($cate)) {
            $category = Category::findByIdOrSlug($cate);
            if (empty($category)) {
                throw new NotFoundHttpException('分类不存在');
            }
            $query = $query->andFilterWhere(['category_id' => $category->id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'published_at' => SORT_DESC
                ],
                'attributes' => [
                    'published_at',
                    'view'
                ]
            ]
        ]);
        // 热门标签
        $hotTags = Tag::hot();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'category' => $category,
            'hotTags' => $hotTags
        ]);
    }

    /**
     * 标签文章列表
     */
    public function actionTag($name)
    {
        /* @var $tag Tag */
        $tag = Tag::find()->where(['name' => $name])->one();
        if (empty($tag)) {
            throw new NotFoundHttpException('标签不存在');
        }
        $query = $tag->getArticles();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'published_at' => SORT_DESC
                ]
            ]
        ]);
        // 热门标签
        $hotTags = Tag::find()->orderBy('article desc')->all();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'tag' => $tag,
            'hotTags' => $hotTags
        ]);
    }
    /**
     * 文章详情
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        /* @var $model Article|null */
        $model = Article::find()->where(['id' => $id])->published()->one();
        if ($model === null) {
            throw new NotFoundHttpException('not found');
        }
        $model->addView();

        // sidebar
        $hots = Article::hots($model->category_id);
        // 评论列表
        $commentDataProvider = new ActiveDataProvider([
            'query' => Comment::find()->andWhere(['type' => 'article', 'type_id' => $id, 'parent_id' => 0]),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'is_top' => SORT_DESC,
                    'id' => SORT_DESC
                ]
            ]
        ]);
        $commentModels = $commentDataProvider->getModels();
        $pages = $commentDataProvider->getPagination();
        // 评论框
        $commentModel = new Comment();
        $commentModel->type = 'article';

        return $this->render($model->module . '/view', [
            'model' => $model,
            'commentModel' => $commentModel,
            'commentModels' => $commentModels,
            'pages' => $pages,
            'hots' => $hots,
            'commentDataProvider' => $commentDataProvider
        ]);
    }

    /**
     * @param $id
     * @return Article|null
     * @throws NotFoundHttpException
     */
    private function findModel($id)
    {
        /* @var $model Article|null */
        $model = Article::find()->where(['id' => $id])->published()->one();
        if ($model === null) {
            throw new NotFoundHttpException('not found');
        }
        return $model;
    }
}

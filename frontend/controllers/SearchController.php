<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/6/30
 * Time: 下午2:11
 */

namespace frontend\controllers;


use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class SearchController extends Controller
{

    public function actionIndex()
    {
        $q = \Yii::$app->request->get('q');
        if (empty($q)){
            return $this->goHome();
        }
        $dataProvider = \Yii::$app->search->search($q);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'q' => $q
        ]);
    }
}
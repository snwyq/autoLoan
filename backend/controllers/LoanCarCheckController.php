<?php

namespace backend\controllers;

use Yii;
use common\models\LoanCarCheck;
use backend\models\search\LoanCarCheckSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * LoanCarCheckController implements the CRUD actions for LoanCarCheck model.
 */
class LoanCarCheckController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                        'class' => ModelControlBehavior::className(),
                        'modelClass' => 'common\models\LoanCarCheck',
                        'searchModelClass' => 'backend\models\search\LoanCarCheckSearch'            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => $this->accessRules(),
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
//            'index' => [
//                'class' => 'yii2tech\admin\actions\Index',
//
//            ],
            'view' => [
                'class' => 'yii2tech\admin\actions\View',
            ],
            'create' => [
                'class' => 'yii2tech\admin\actions\Create',
                'scenario' => \yii\base\Model::SCENARIO_DEFAULT,
            ],
            'update' => [
                'class' => 'yii2tech\admin\actions\Update',
                'scenario' => \yii\base\Model::SCENARIO_DEFAULT,
            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
            ],
        ];
    }



    //每日盘库记录

    public function  actionIndex($check_class=1)
    {
        $filter = [
            'check_class_id' =>$check_class,
        ];

        $searchModel = new LoanCarCheckSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

   // 车辆抽检记录


    public function  actionPlanCheckIndex($check_class=2)
    {
        $filter = [
            'check_class_id' =>$check_class,
        ];

        $searchModel = new LoanCarCheckSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the LoanCarCheck model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoanCarCheck the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = LoanCarCheck::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
    return new LoanCarCheck();
    }



    //得到视图路径

    public function getViewPath()
    {
        return $this->module->getViewPath() . DIRECTORY_SEPARATOR . 'loan-car/loan-car-check';
    }
    /**
    * Returns the access rules for this controller.
    * This is method is a shortcut, allowing quick adjustment of the [[AccessControl]] filter attached at [[behaviors()]].
    * Be careful in case you override [[behaviors()]] method, since it may loose configuration provided by this method.
    * @return array list of access rules. See [[AccessControl::rules]] for details about rule specification.
    */
    public function accessRules()
    {
        return [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ];
    }


}

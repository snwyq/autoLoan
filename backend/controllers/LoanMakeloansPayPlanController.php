<?php

namespace backend\controllers;

use common\models\LoanCar;
use Yii;
use common\models\LoanMakeloansPayPlan;
use backend\models\search\LoanMakeloansPayPlanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * LoanMakeloansPayPlanController implements the CRUD actions for LoanMakeloansPayPlan model.
 */
class LoanMakeloansPayPlanController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                        'class' => ModelControlBehavior::className(),
                        'modelClass' => 'common\models\LoanMakeloansPayPlan',
                        'searchModelClass' => 'backend\models\search\LoanMakeloansPayPlanSearch'            ],
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
            'index' => [
                'class' => 'yii2tech\admin\actions\Index',

            ],
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

    /**
     * Finds the LoanMakeloansPayPlan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoanMakeloansPayPlan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = LoanMakeloansPayPlan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
    return new LoanMakeloansPayPlan();
    }



    /*
 *  运营 “逾期处理”
 * */

    public function  actionOverDual($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new LoanMakeloansPayPlanSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-over-dual/index', [
            'status' => LoanMakeloansPayPlan::getStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /*
     *  财务“还款处理”
     * */

    public function  actionAccAddRepay($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new LoanMakeloansPayPlanSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-acc-add-repay/index', [
            'status' => LoanMakeloansPayPlan::getStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //得到视图路径

    public function getViewPath()
    {
        return $this->module->getViewPath() . DIRECTORY_SEPARATOR . 'loan';
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

<?php

namespace backend\controllers;

use common\models\Loan;
use common\models\LoanCarAssess;
use Yii;
use common\models\LoanCar;
use backend\models\search\LoanCarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * LoanCarController implements the CRUD actions for LoanCar model.
 */
class LoanCarController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                'class' => ModelControlBehavior::className(),
                'modelClass' => 'common\models\LoanCar',
                'searchModelClass' => 'backend\models\search\LoanCarSearch'],
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
//            'create' => [
//                'class' => 'yii2tech\admin\actions\Create',
//                'scenario' => \yii\base\Model::SCENARIO_DEFAULT,
//            ],
//            'update' => [
//                'class' => 'yii2tech\admin\actions\Update',
//                'scenario' => \yii\base\Model::SCENARIO_DEFAULT,
//            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
            ],
        ];
    }



    /**
     *  借款初审列表
     *  是在运营功能下面的首页
     *
     * @param int $status
     * @return mixed
     * @internal param int $id
     */

    public function  actionLoanCarChangeIndex($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new LoanCarSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-change/index_loan_car', [
            'status' => LoanCar::getCarStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     *  借款初审列表
     *  是在运营功能下面的首页
     *
     * @param int $status
     * @return mixed
     * @internal param int $id
     */

    public function  actionLoanCarOutIndex($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new LoanCarSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-out/index', [
            'status' => LoanCar::getCarStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     *  借款车辆台帐
     *  是在运营功能下面的首页
     *
     * @param int $status
     * @return mixed
     * @internal param int $id
     */

    public function  actionLoanCarBillIndex($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new LoanCarSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-bill/index', [
            'status' => LoanCar::getCarStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     *  借款车辆台帐
     *  是在运营功能下面的首页
     *
     * @param int $status
     * @return mixed
     * @internal param int $id
     */

    public function  actionLoanCarListIndex($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new LoanCarSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-list/index', [
            'status' => LoanCar::getCarStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Finds the LoanCar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoanCar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = LoanCar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
        return new LoanCar();
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

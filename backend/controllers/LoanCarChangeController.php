<?php

namespace backend\controllers;

use backend\models\search\LoanCarSearch;
use common\models\LoanCar;
use common\models\LoanCarAssess;
use GuzzleHttp\Promise\AggregateException;
use Yii;
use common\models\LoanCarChange;
use backend\models\search\LoanCarChangeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * LoanCarChangeController implements the CRUD actions for LoanCarChange model.
 */
class LoanCarChangeController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                'class' => ModelControlBehavior::className(),
                'modelClass' => 'common\models\LoanCarChange',
                'searchModelClass' => 'backend\models\search\LoanCarChangeSearch'],
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

//            ],
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

    /*
 * list all  全部置换申请单
 * */
    public function  actionIndex($status = 3)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new LoanCarChangeSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere($filter);

        return $this->render('index', [
            'status' => LoanCarChange::getStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //创建一个置换申请单


    public function actionCreate($id)
    {

        $carModel = LoanCar::findOne(['id' => $id]);
        $carAssess = LoanCarAssess::findOne(['car_id' => $id]);

        if (!$carModel) {
            throw new NotFoundHttpException('车辆不存在.');
        }

        $exist = LoanCarChange::findOne(['car_id' => $id, 'status' => 1]);
        if ($exist) {
            throw new NotFoundHttpException('置换单已经存在，请不要重复提交.');
        }


        $model = new LoanCarChange();

        $model->change_no = 'ZH' . date("mdHis", time());//
        $model->loan_id = $carModel->loan_id;
        $model->customer_id = $carModel->customer_id;
        $model->car_id = $id;
        $model->manager_id = Yii::$app->user->id;
        $model->status = LoanCarChange::CARASSESS;

        if ($carAssess) {
            $model->car_audit_money = (is_null($carAssess->audit_loan_money)) ? $carAssess->assess_loan_money : $carAssess->audit_loan_money;
            $model->min_change_money = (is_null($carAssess->audit_loan_money)) ? $carAssess->assess_loan_money : $carAssess->audit_loan_money;
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //更新置换车辆的状态为置换待出
            $carModel->status = 6;
            $carModel->save(false);
            //弹出成功提示
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '成功！'));
            return $this->redirect(['loan-car/loan-car-change-index', 'status' => 6]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function  actionLoanCarChangeDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'change_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['change_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }


    //得到视图路径

    public function getViewPath()
    {
        return $this->module->getViewPath() . DIRECTORY_SEPARATOR . 'loan-car/loan-car-change';
    }

    /**
     * Finds the LoanCarChange model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoanCarChange the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = LoanCarChange::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
        return new LoanCarChange();
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

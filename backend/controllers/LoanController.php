<?php

namespace backend\controllers;

use backend\models\search\LoanCarAssessSearch;
use backend\models\search\LoanCarSearch;
use common\models\LoanCarAssess;
use Pheanstalk\Response;
use Yii;
use common\models\Loan;
use backend\models\search\LoanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;
use yii\web\Response as YiiResponse;

/**
 * LoanController implements the CRUD actions for Loan model.
 */
class LoanController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                'class' => ModelControlBehavior::className(),
                'modelClass' => 'common\models\Loan',
                'searchModelClass' => 'backend\models\search\LoanSearch'],
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


    //主页列出各种状态的借款单的状态


    public function  actionIndex($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);

        return $this->render('index', [
            'status' => Loan::getLoanStatus(),
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

    public function  actionFristAuditIndex($status = 2)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);

        return $this->render('loan-first-audit/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 借款初审结果提交
     *
     * @param int $id
     * @return mixed
     * @internal param int $id
     */
    public function  actionFirstAuditUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '成功！'));
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('loan-first-audit/update', [
                'model' => $model,
            ]);
        }

    }


    /**
     *  借款初审列表
     *  是在运营功能下面的首页
     *
     * @param int $status
     * @return mixed
     * @internal param int $id
     *
     * const  TEMP = 1;     //未提报
     * const  FRISTAUDIT = 2;     //借款初审
     * const  CARASSESS = 3;     //车辆评估
     * const  CARASSESSAUDIT = 4;     //总部核价
     * const  CARCONTROL = 5;     //车辆监管
     * const  CARASSESSADD = 6;     //车辆补质
     * const  CONTRACTADD = 7;     //初审
     * const  WAITMONEY = 8;     //待放款
     * const  PAYING = 9;     //还款中
     * const  LOANSTOP = -10;    //中止
     * const  LOANCLOSE = 10;   //还清
     *
     * '10' => '还清',
     */

    public function  actionCarAssessIndex($status = 3)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);

        return $this->render('car-assess/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //评估车辆浏览单据详情

    public function  actionCarAssessView($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];

        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);


        return $this->render('car-assess/view', ['model' => $model,
        'dataProvider'=>$dataProvider,
        ]);

    }


    //未提到到提报到借款初审

    public function  actionChangeStatus()
    {

        Yii::$app->response->format = YiiResponse::FORMAT_JSON;

        $id = Yii::$app->request->post('id');
        $to = Yii::$app->request->post('to');

        $model = $this->findModel($id);

        if (!$model) {
            throw new NotFoundHttpException('指定的单据不存在!');
        }
        //
        $model->status = $to;

        $model->save(false);

        return [
            'message' => '操作成功'
        ];


    }

    /**
     * Finds the Loan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Loan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public
    function findModel($id)
    {
        if (($model = Loan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public
    function newModel()
    {
        return new Loan();
    }


    /**
     * Returns the access rules for this controller.
     * This is method is a shortcut, allowing quick adjustment of the [[AccessControl]] filter attached at [[behaviors()]].
     * Be careful in case you override [[behaviors()]] method, since it may loose configuration provided by this method.
     * @return array list of access rules. See [[AccessControl::rules]] for details about rule specification.
     */
    public
    function accessRules()
    {
        return [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ];
    }


}

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
//            'create' => [
//                'class' => 'yii2tech\admin\actions\Create',
//                'scenario' => \yii\base\Model::SCENARIO_DEFAULT,
//            ],
            'update' => [
                'class' => 'yii2tech\admin\actions\Update',
                'scenario' => \yii\base\Model::SCENARIO_DEFAULT,
            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
            ],
        ];
    }


    //待提报借款单首页

    public function  actionLoanAddIndex($status = 1)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);

        return $this->render('loan-add/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Base model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionLoanAdd()
    {
        $model = new Loan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '成功！'));
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('loan-add/create', [
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
     */

    public function  actionLoanFirstAuditIndex($status = 2)
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
    public function  actionLoanFirstAuditUpdate($id)
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
     */

    public function  actionLoanCarAssessIndex($status = 3)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-car-assess/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    //评估车辆浏览单据详情

    public function  actionLoanCarAssessDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-assess/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }

    //车辆核价功能

    public function  actionCarAssessAuditIndex($status = 4)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-car-assess-audit/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //评估车辆浏览单据详情

    public function  actionLoanCarAssessAuditDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-assess-audit/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }



    //车辆监管功能

    public function  actionLoanCarControlIndex($status = 5)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-car-control/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //监管浏览单据详情

    public function  actionLoanCarControlDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-control/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }



//车辆补质首页功能

    public function  actionLoanCarAssessAddIndex($status = 6)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-car-assess-add/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //车辆补质功能详情

    public function  actionLoanCarAssessAddDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-car-assess-add/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }





//借款合同首页功能

    public function  actionLoanContractIndex($status = 7)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-contract/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //车辆合同功能详情

    public function  actionLoanContractDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-contract/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }


    //放款首页功能

    public function  actionLoanMakeLoanIndex($status = 8)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-make-loan/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //放款功能清单详情

    public function  actionLoanMakeLoanDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-make-loan/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }
//放款首页功能

    public function  actionLoanRepayingIndex($status = 9)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-repaying/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //放款功能清单详情

    public function  actionLoanRepayingDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-repaying/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }

    //放款首页功能

    public function  actionLoanStopIndex($status = -10)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-stop/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //放款功能清单详情

    public function  actionLoanStopDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-stop/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }


    //放款首页功能

    public function  actionLoanCloseIndex($status = 10)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-close/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //放款功能清单详情

    public function  actionLoanCloseDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-close/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }



    //放款首页功能

    public function  actionLoanBillIndex($status = 10)
    {

        $filter = [
            'status' => $status,   //默认未提报的单子
        ];
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        //Test::model()->findAll(array('select'=>'name, sum(record) as summary','group'=>'category'));


        return $this->render('loan-bill/index', [
            'status' => Loan::getLoanStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //放款功能清单详情

    public function  actionLoanBillDetail($id)
    {

        $model = $this->findModel($id);
        //授信结论列表
        $filter = [
            'loan_id' => $model->id,
        ];


        $result = LoanCarAssess::find()->where(['loan_id' => $model->id])->sum('assess_loan_money');


        $searchModel = new LoanCarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where($filter);

        return $this->render('loan-bill/detail', ['model' => $model,
            'dataProvider' => $dataProvider,
            'summoney' => $result,
        ]);

    }



    //放款功能-借款详情页

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

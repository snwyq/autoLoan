<?php

namespace backend\controllers;

use backend\models\search\CustomerCreditDetailSearch;
use backend\models\search\CustomerCreditProcessHisSearch;
use backend\models\search\CustomerCreditSurveySearch;
use common\models\Customer;
use common\models\CustomerCreditDetail;
use common\models\CustomerCreditSurvey;
use Yii;
use common\models\CustomerCreditApply;
use backend\models\search\CustomerCreditApplySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * CustomerCreditApplyController implements the CRUD actions for CustomerCreditApply model.
 */
class CustomerCreditApplyController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                'class' => ModelControlBehavior::className(),
                'modelClass' => 'common\models\CustomerCreditApply',
                'searchModelClass' => 'backend\models\search\CustomerCreditApplySearch'],
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
//            'view' => [
//                'class' => 'yii2tech\admin\actions\View',
//            ],
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
     * Updates an existing CarouselItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $customer = Customer::findOne(['id' => $model->customer_id]);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '成功更新！'));
            if ($model->apply_type_id == CustomerCreditApply::CREDIT_ADD) {
                return $this->redirect(['customer-credit-apply/credit-add-list']);
            } else {
                return $this->redirect(['customer-credit-apply/credit-change-list']);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'customer' => $customer,
        ]);
    }


    //增加一个新的授信申请

    public function actionCreate($type = null)
    {
        $model = new CustomerCreditApply();

        if ($type == 2) {

            $model->scenario = "changeCredit";
        } elseif ($type == 3) {
            $model->scenario = "goonCredit";
        } else {
            $model->scenario = "addCredit";
        }


        $model->apply_no = 'SX' . date("mdHis", time());//授信
        $model->apply_type_id = CustomerCreditApply::CREDIT_ADD;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success', Yii::t('common', 'Created success'));

            if ($model->apply_type_id == CustomerCreditApply::CREDIT_ADD) {
                return $this->redirect(['customer-credit-apply/credit-add-list']);
            } else {
                return $this->redirect(['customer-credit-apply/credit-change-list']);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /*
    * list all   新增授信的记录
    * */
    public function  actionCreditAddList($status = 1)
    {

        $filter = [
            'apply_type_id' => CustomerCreditApply::CREDIT_ADD,
            'status' => $status,   //默认未提报的单子
        ];


        $searchModel = new CustomerCreditApplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);

        return $this->render('applyList', [
            'status' => CustomerCreditApply::getStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /*
      * list all  授信 变更的记录
      * */
    public function  actionCreditChangeList($status = 1)
    {

        $filter = [
            'and', 'status=' . $status,
            [
                'or',
                'apply_type_id=' . CustomerCreditApply::CREDIT_CHANGE,
                'apply_type_id=' . CustomerCreditApply::CREDIT_GOON,
            ]
        ];


        $searchModel = new CustomerCreditApplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        return $this->render('changeList', [
            'status' => CustomerCreditApply::getStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /*
    * list all  待审核的新增授信
    * */
    public function  actionAuditNewCredit($status = 3)
    {

        $filter = [
            'apply_type_id' => CustomerCreditApply::CREDIT_ADD,
            'status' => $status,   //默认未提报的单子
        ];

        $searchModel = new CustomerCreditApplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        return $this->render('auditNewCreditList', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'status' => CustomerCreditApply::getStatus(),
        ]);
    }


    /*
  * list all   待变更的授信记录
  * */
    public function  actionAuditChangeCredit($status = 3)
    {

        $filter = [
            'and', 'status=' . $status,
            [
                'or',
                'apply_type_id=' . CustomerCreditApply::CREDIT_CHANGE,
                'apply_type_id=' . CustomerCreditApply::CREDIT_GOON,
            ]
        ];


        $searchModel = new CustomerCreditApplySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        return $this->render('changeList', [
            'status' => CustomerCreditApply::getStatus(),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    //$creditDetail

    public function  actionView($id)
    {
        $model = $this->findModel($id);


        //授信历史
        $filter_his = [
            'apply_id' => $model->id,
        ];

        $searchModel_his = new CustomerCreditProcessHisSearch();
        $dataProvider_his = $searchModel_his->search(Yii::$app->request->queryParams, $filter_his);


        //尽调报告

        $creditSurvey = CustomerCreditSurvey::find()->where(['apply_id' => $model->id])->one();

        if (empty($creditSurvey)) {
            $creditSurvey = new CustomerCreditSurvey();
        }


        //授信结论列表
        $filter = [
            'customer_id' => $model->customer_id,
        ];

        $searchModel = new CustomerCreditDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $filter);


        return $this->render('view', [
            'model' => $this->findModel($id),
            'creditDetail' => $dataProvider,
            'creditSurvey' => $creditSurvey,
            'creditProcessHis' => $dataProvider_his,
        ]);
    }

    /**
     * 初审通过
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionAuditOk()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $id = Yii::$app->request->post('id');
        $model = CustomerCreditApply::find()->where(['id' => $id])->one();
        if (!$model) {
            throw new NotFoundHttpException('授信申请不存在!');
        }
        //
        $model->status = 4;
        $model->save(false);

        return [
            'message' => '操作成功'
        ];
    }

    /**
     * 初审不通过
     * @return array
     * @throws NotFoundHttpException
     */

    public function actionAuditBack($id)
    {

        $model = $this->findModel($id);
        $model->scenario='audit';
        $model->status = 2 ;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '审核完成！'));
            return $this->redirect(['view','id'=>$model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);


    }


    /**
     * Finds the CustomerCreditApply model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerCreditApply the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = CustomerCreditApply::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
        return new CustomerCreditApply();
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

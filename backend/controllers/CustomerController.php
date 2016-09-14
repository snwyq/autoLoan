<?php

namespace backend\controllers;

use common\models\CompanyBizAddress;
use common\models\CompanyChangeHistory;
use common\models\CompanyMember;
use common\models\CompanyOtherLoan;
use common\models\CompanyProfile;
use common\models\CompanyRelationCompany;
use common\models\CompanyStockholder;
use common\models\CompanyTradeCondition;
use common\models\PersonFamilyCar;
use common\models\PersonFamilyDebitCard;
use common\models\PersonFamilyHouse;
use common\models\PersonFamilyIncome;
use common\models\PersonFamilyMember;
use common\models\PersonFamilyPay;
use common\models\PersonProfile;
use common\models\PersonWork;
use Yii;
use common\models\Customer;
use backend\models\search\CustomerSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                'class' => ModelControlBehavior::className(),
                'modelClass' => 'common\models\Customer',
                'searchModelClass' => 'backend\models\search\CustomerSearch'],
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '借款人信息成功更新！'));
            return $this->redirect(['update', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
            'customer'=>$model
        ]);
    }



    /*
     * list all  person customer by  wyq @2016.9.6
     * */
    public  function  actionPerson(){


        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,Customer::CUSTOMER_PERSON);

        return $this->render('person/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /*
      * list all  company  customer by  wyq @2016.9.6
      * */
    public  function  actionCompany(){


        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,Customer::CUSTOMER_COMPANY);

        return $this->render('company/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }




    /**------------------------------------------------------------------------------company---------------------------------
     * Creates a new Carousel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateCompany()
    {
        $model = new Customer();
        $model->code ='JKQY'.date("mdHis",time()) ;
        $model->class= Customer::CUSTOMER_COMPANY;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success', Yii::t('common', 'Created success'));

            return $this->redirect(['update-company', 'id' => $model->id]);
        } else {
            return $this->render('company/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CarouselItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateCompany($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '借款人信息成功更新！'));
            return $this->redirect(['update-company', 'id' => $model->id]);
        }
        return $this->render('company/update', [
            'model' => $model,
            'customer'=>$model,
        ]);
    }

    /**
     * Displays a single SystemLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewCompany($id)
    {
        return $this->render('company/view', [
            'model' => $this->findModel($id),
        ]);
    }


    /*
   *  企业档案 修改     by  wyq  @2016.09.01
   */

    public  function  actionCompanyProfile($id)
    {
        $customer = $this->findModel($id);

        if(!$model = CompanyProfile::findOne(['customer_id'=>$id]))
        {
            $model =  new CompanyProfile();
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', '成功更新！'));
            return $this->refresh();

        }
        else {
            return $this->render('company-profile/update', [
                'customer' => $customer,
                'model'=>$model,
            ]);
        }

    }

    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionStockholderList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>CompanyStockholder::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('company-stockholder/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }



    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionMemberList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>CompanyMember::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('company-member/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }

    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionRelationCompanyList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>CompanyRelationCompany::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('company-relation-company/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }

    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionTradeConditionList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>CompanyTradeCondition::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('company-trade-condition/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }

    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionChangeHistoryList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>CompanyChangeHistory::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('company-change-history/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }

    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionBizAddressList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>CompanyBizAddress::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('company-biz-address/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }

    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionOtherLoanList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>CompanyOtherLoan::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('company-other-loan/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }





    /**------------------------------------------------------------------------------company- end  -------------------------------------------------------

    /**
     * Creates a new Carousel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePerson()
    {
        $model = new Customer();
        $model->code ='JKR'.date("mdHis",time()) ;
        $model->class= Customer::CUSTOMER_PERSON;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->getSession()->setFlash('success', Yii::t('common', 'Created success'));

            return $this->redirect(['update-person', 'id' => $model->id]);
        } else {
            return $this->render('person/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CarouselItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePerson($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '借款人信息成功更新！'));
            return $this->redirect(['update-person', 'id' => $model->id]);
        }
        return $this->render('person/update', [
            'model' => $model,
            'customer'=>$model,
        ]);
    }


    /**
     * Displays a single SystemLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewPerson($id)
    {
        return $this->render('person/view', [
            'model' => $this->findModel($id),
        ]);
    }


    /*
    *  以下是增加的个人信息的二级修改   by  wyq  @2016.09.01
    */

    // 修改个人详情
    //
    public  function  actionCustomerProfile($id)
    {
        $customer = $this->findModel($id);

        if(!$model = PersonProfile::findOne(['customer_id'=>$id]))
        {
            $model =  new PersonProfile();
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', '成功更新！'));
            return $this->refresh();

        }
        else {
            return $this->render('person-profile/update', [
                'customer' => $customer,
                'model'=>$model,
            ]);
        }

    }

    //3.0 取得家庭成员 by wyq 20160816
    public  function  actionFamilyMemberList($id)
    {
        $customer = $this->findModel($id);

        $dataProvider = new ActiveDataProvider(
            [
                'query'=>PersonFamilyMember::find()->where(['customer_id'=>$customer->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('person-family-member/index',['customer'=>$customer,'dataProvider'=>$dataProvider]);

    }

    //3.0 取得工作经历

    public  function  actionPersonWorkList($id){

        $model = $this->findModel($id);

        $dataProvider= new ActiveDataProvider(
            [
                'query'=>PersonWork::find()->where(['customer_id'=>$model->id,'status'=>1])->orderBy('id'),
            ]
        );

        return $this->render('person-work/index',['customer'=>$model,'dataProvider'=>$dataProvider]);

    }

    //增加名下汽车
    public  function  actionFamilyCarList($id){

        $model = $this->findModel($id);
        $query = PersonFamilyCar::find()->where(['customer_id'=>$model->id,'status'=>1]);
        $dataProvider = new ActiveDataProvider(
            [
                'query'=>$query,
            ]
        );

        return $this->render('person-family-car/index',['customer'=>$model,'dataProvider'=>$dataProvider]);

    }

    //增加名下房产
    public  function  actionFamilyHouseList($id){

        $model = $this->findModel($id);
        $query = PersonFamilyHouse::find()->where(['customer_id'=>$model->id,'status'=>1]);
        $dataProvider = new ActiveDataProvider(
            [
                'query'=>$query,
            ]
        );

        return $this->render('person-family-house/index',['customer'=>$model,'dataProvider'=>$dataProvider]);

    }
    //增加信用卡
    public  function  actionFamilyDebitcardList($id){

        $model = $this->findModel($id);
        $query = PersonFamilyDebitCard::find()->where(['customer_id'=>$model->id,'status'=>1]);
        $dataProvider = new ActiveDataProvider(
            [
                'query'=>$query,
            ]
        );

        return $this->render('person-family-debit-card/index',['customer'=>$model,'dataProvider'=>$dataProvider]);

    }
    //增加家庭收入


    //增加家庭支出




  public  function  actionFamilyIncomeList($id){

        $model = $this->findModel($id);
        $query = PersonFamilyIncome::find()->where(['customer_id'=>$model->id,'status'=>1]);
        $dataProvider = new ActiveDataProvider(
            [
                'query'=>$query,
            ]
        );

        return $this->render('person-family-income/index',['customer'=>$model,'dataProvider'=>$dataProvider]);

    }

    //增加家庭支出

    public  function  actionFamilyPayList($id){

        $model = $this->findModel($id);
        $query = PersonFamilyPay::find()->where(['customer_id'=>$model->id,'status'=>1]);
        $dataProvider = new ActiveDataProvider(
            [
                'query'=>$query,
            ]
        );

        return $this->render('person-family-pay/index',['customer'=>$model,'dataProvider'=>$dataProvider]);

    }




    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
        return new Customer();
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

<?php

namespace backend\controllers;

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
            'update' => [
                'class' => 'yii2tech\admin\actions\Update',
                'scenario' => \yii\base\Model::SCENARIO_DEFAULT,
            ],
            'delete' => [
                'class' => 'yii2tech\admin\actions\Delete',
            ],
        ];
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

<?php

namespace backend\controllers;

use common\models\Customer;
use Yii;
use common\models\PersonFamilyDebitCard;
use backend\models\search\PersonFamilyDebitCardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * PersonFamilyDebitCardController implements the CRUD actions for PersonFamilyDebitCard model.
 */
class PersonFamilyDebitCardController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                        'class' => ModelControlBehavior::className(),
                        'modelClass' => 'common\models\PersonFamilyDebitCard',
                        'searchModelClass' => 'backend\models\search\PersonFamilyDebitCardSearch'            ],
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
//            'delete' => [
//                'class' => 'yii2tech\admin\actions\Delete',
//            ],
        ];
    }


    public function  getViewPath()
    {
        return $this->module->getViewPath() . DIRECTORY_SEPARATOR . 'customer/person-family-debit-card';
    }


    /**
     * Displays a single SystemLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $customer_id = $model->customer_id;
        $customer = Customer::findOne(['id' =>$customer_id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'customer' => $customer,
        ]);
    }
    /**
     * Creates a new Carousel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $customer = Customer::findOne(['id' => $id]);
        $customer_id = $id;
        $model = new PersonFamilyDebitCard();
        $model->customer_id = $id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '增加成功！'));
            return $this->redirect(['customer/family-debitcard-list', 'id' =>$customer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'customer' => $customer,
            ]);
        }
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
        $customer_id = $model->customer_id;
        $customer = Customer::findOne(['id' =>$customer_id]);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '更新成功！'));
            return $this->redirect(['customer/family-debitcard-list', 'id' =>$customer_id]);
        }
        return $this->render('update', [
            'model' => $model,
            'customer' => $customer,
        ]);
    }

    /**
     * Deletes an existing CarouselItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $customer_id = $model->customer_id;
        if ($model->delete()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('backend', '删除成功！'));
            return $this->redirect(['customer/family-debitcard-list', 'id' =>$customer_id]);
        };
    }

    /**
     * Finds the PersonFamilyDebitCard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PersonFamilyDebitCard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = PersonFamilyDebitCard::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
    return new PersonFamilyDebitCard();
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

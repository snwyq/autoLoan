<?php

namespace backend\controllers;

use Yii;
use common\models\CustomerCreditSurvey;
use backend\models\search\CustomerCreditSurveySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * CustomerCreditSurveyController implements the CRUD actions for CustomerCreditSurvey model.
 */
class CustomerCreditSurveyController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                        'class' => ModelControlBehavior::className(),
                        'modelClass' => 'common\models\CustomerCreditSurvey',
                        'searchModelClass' => 'backend\models\search\CustomerCreditSurveySearch'            ],
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
     * Finds the CustomerCreditSurvey model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CustomerCreditSurvey the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = CustomerCreditSurvey::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
    return new CustomerCreditSurvey();
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

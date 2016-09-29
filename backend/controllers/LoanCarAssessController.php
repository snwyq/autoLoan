<?php

namespace backend\controllers;

use common\models\Loan;
use common\models\LoanCar;
use Yii;
use common\models\LoanCarAssess;
use backend\models\search\LoanCarAssessSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii2tech\admin\behaviors\ModelControlBehavior;
use yii\filters\AccessControl;

/**
 * LoanCarAssessController implements the CRUD actions for LoanCarAssess model.
 */
class LoanCarAssessController extends Controller
{
    public function behaviors()
    {
        return [
            'model' => [
                        'class' => ModelControlBehavior::className(),
                        'modelClass' => 'common\models\LoanCarAssess',
                        'searchModelClass' => 'backend\models\search\LoanCarAssessSearch'            ],
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
//            'delete' => [
//                'class' => 'yii2tech\admin\actions\Delete',
//            ],
        ];
    }

    public function  getViewPath()
    {
        return $this->module->getViewPath() . DIRECTORY_SEPARATOR . 'loan/loan-car-assess';
    }



    public function  actionCreate($loan_id)
    {

        //  $assessmodel

        $model = new LoanCar();
        $model->loan_id=$loan_id;

        $loanModel = Loan::findOne(['id'=>$loan_id]);

        $model->customer_id =$loanModel->customer_id;
        $model->status = 2 ;    //待核价

        $assessmodel = new LoanCarAssess();
        $assessmodel->loan_id=$loan_id;
        $assessmodel->customer_id =$loanModel->customer_id;


        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->load(Yii::$app->request->post());

                $model->save();

                $assessmodel->load(Yii::$app->request->post());

                $assessmodel->car_id = $model->id;
                $assessmodel->car_displacement = $model->car_displacement;
                $assessmodel->customer_id = $model->customer_id;

                $assessmodel->save();
                if ($model->hasErrors() || $assessmodel->hasErrors()) {
                    Yii::$app->getSession()->setFlash('error', Yii::t('backend', '失败！'));
                    throw new Exception('操作失败');
                }
                $transaction->commit();
                Yii::$app->getSession()->setFlash('success', Yii::t('backend', '成功增加！'));
            } catch (\Exception $e) {

                $transaction->rollBack();
            }

            return $this->redirect(['loan/car-assess-view','id'=>$loan_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'assessmodel' => $assessmodel,
        ]);


    }


    public function  actionUpdate($id)
    {

        //  $assessmodel

        $model = LoanCar::findOne(['id'=>$id]);   //$this->findModel($id);

        $assessmodel = LoanCarAssess::findOne(['car_id'=>$model->id]);



        if (Yii::$app->request->isPost) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->load(Yii::$app->request->post());

                $model->save();

                $assessmodel->load(Yii::$app->request->post());

                $assessmodel->save();
                if ($model->hasErrors() || $assessmodel->hasErrors()) {
                    Yii::$app->getSession()->setFlash('error', Yii::t('backend', '失败！'));
                    throw new Exception('操作失败');
                }
                $transaction->commit();
                Yii::$app->getSession()->setFlash('success', Yii::t('backend', '成功增加！'));
            } catch (\Exception $e) {

                die();

                $transaction->rollBack();
            }

            return $this->redirect(['loan/car-assess-view','id'=>$model->loan_id]);
        }



        return $this->render('update', [
            'model' => $model,
            'assessmodel' => $assessmodel,
        ]);


    }

    /**
     * 彻底删除
     * @return array
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionDelete($id)
    {

        $model = LoanCar::findOne(['id'=>$id]);
        $assessmodel = LoanCarAssess::findOne(['car_id'=>$model->id]);

        if(!$model) {
            throw new NotFoundHttpException('车辆不存在!');
        }


        $assessmodel->delete();
        $model->delete();

        return $this->redirect(['loan/car-assess-view','id'=>$model->loan_id]);

    }


    /**
     * Finds the LoanCarAssess model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LoanCarAssess the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = LoanCarAssess::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function newModel()
    {
    return new LoanCarAssess();
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

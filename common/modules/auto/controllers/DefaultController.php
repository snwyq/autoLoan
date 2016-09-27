<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/12
 * Time: 下午12:03
 */

namespace common\modules\auto\controllers;


use common\models\AutoModel;
use common\models\AutoBrand;
use common\models\AutoSeries;
use yii\web\Controller;
use common\models\City;

class DefaultController extends Controller
{

    //根据品牌ID得到系列
    public  function  actionGetBrand()
    {
        \Yii::$app->response->format='json';

        return AutoBrand::getBrand();
    }


    //根据品牌ID得到系列
    public  function  actionGetSeries($id)
    {
        \Yii::$app->response->format='json';

        if(!is_numeric($id)){
            $id = null;
        }

        return AutoSeries::getSeriesByBrand($id);
    }

    //根据系列得到车型

    public  function  actionGetModel($id)
    {
        \Yii::$app->response->format='json';

        if(!is_numeric($id)){
            $id = null;
        }

        return AutoModel::getModelBySeries($id);
    }


}
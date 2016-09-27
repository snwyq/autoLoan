<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/12
 * Time: 上午11:18
 */

namespace common\modules\auto\widgets;


use yii\base\InvalidConfigException;
use yii\helpers\Html;
use common\models\AutoModel;
use common\models\AutoBrand;
use common\models\AutoSeries;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\widgets\InputWidget;

class AutoWidget extends InputWidget
{
    public $brandAttribute;
    public $brandName;
    public $brandValue;
    public $brandPrompt = '请选择';
    public $seriesAttribute;
    public $seriesName;
    public $seriesValue;
    public $seriesPrompt = '请选择';
    public $modelAttribute;
    public $modelName;
    public $modelValue;
    public $modelPrompt = '请选择';

    public $required = false;

    public $route_series = ['/auto/default/get-series'];
    public $route_model = ['/auto/default/get-model'];
    /**
     * @var $fullArea string|array 地区合集 eg. 北京 北京市 东城区
     */
    public $fullmodel;
    public $defaultOptions = ['id' => 'auto-three-level-link', 'class' => 'form-group form-inline'];
    public $selectClass = 'form-control';
    public $clientOptions = [];

    public function init()
    {
        $this->options = array_merge($this->defaultOptions, $this->options);
        if (!isset($this->options['id'])) {
            throw new InvalidConfigException('{options}.id必须设置');
        }
        parent::init();
        if (!empty($this->fullmodel)) {
            list($this->brandValue, $this->seriesValue, $this->modelValue) = AutoModel::parseFullmodel($this->fullmodel);
        }
    }

    public function run()
    {
        $this->registerClientJs();
        if ($this->hasModel()) {
            $brandValue = Html::getAttributeValue($this->model, $this->brandAttribute);
            $seriesValue = Html::getAttributeValue($this->model, $this->seriesAttribute);
            $select = Html::activeDropDownList($this->model, $this->brandAttribute, AutoBrand::getBrand(), [
                    'class' => $this->selectClass,
                    'prompt' => $this->brandPrompt,
                    'data-target' => Url::to($this->route_series),

                ]) . ' ' . Html::activeDropDownList($this->model, $this->seriesAttribute, AutoSeries::getSeriesByBrand($brandValue), [
                    'class' => $this->selectClass,
                    'prompt' => $this->seriesPrompt,
                    'data-target'=>Url::to($this->route_model),
                ]) . ' ' . Html::activeDropDownList($this->model, $this->modelAttribute, AutoModel::getModelBySeries($seriesValue), [
                    'class' => $this->selectClass,
                    'prompt' => $this->modelPrompt
                ]);
        } else {
            $select = Html::dropDownList($this->brandName, $this->brandValue, AutoBrand::getBrand(), [
                    'class' => $this->selectClass,
                    'prompt' => $this->brandPrompt
                ]) . ' ' . Html::dropDownList($this->seriesName, $this->seriesValue, AutoSeries::getSeriesByBrand($this->brandValue), [
                    'class' => $this->selectClass,
                    'prompt' => $this->seriesPrompt
                ]) . ' ' . Html::dropDownList($this->modelName, $this->modelValue, AutoModel::getModelBySeries($this->seriesValue), [
                    'class' => $this->selectClass,
                    'prompt' => $this->modelPrompt
                ]);
        }

        return Html::tag('div', $select, $this->options);
    }

    public function registerClientJs()
    {
        AutoAsset::register($this->view);
        //$this->clientOptions['url'] = Url::to($this->route);
        $clientOptions = Json::htmlEncode($this->clientOptions);
        $this->view->registerJs("$('#{$this->options['id']} select').getAuto($clientOptions)");
    }
}
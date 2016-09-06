<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/4/27
 * Time: 下午4:07
 */

namespace common\components;


use yii\base\Component;
use common\models\Config as ConfigModel;
use yii\caching\TagDependency;
use yii\helpers\VarDumper;

class Config extends Component
{
    public $cacheKey = 'allSystemConfigs';

    public $cacheTag = 'systemConfig';

    public $localConfigFile;

    public function init()
    {
        parent::init();
        $this->localConfigFile = \Yii::getAlias($this->localConfigFile);
    }

    public function get($name, $default = '')
    {
        $configs = \Yii::$app->cache->get($this->cacheKey);
        if ($configs === false) {
            $configs = ConfigModel::find()->indexBy('name')->all();
            \Yii::$app->cache->set($this->cacheKey, $configs, 60 * 60, new TagDependency(['tags' => $this->cacheTag]));
        }
        if (isset($configs[$name])) {
            $config = $configs[$name];
            return self::_parse($config->type, $config->value);
        } else {
            return env($name, $default);
        }
    }
    public function set($name, $value)
    {
        $result = ConfigModel::updateAll(['value' => $value], ['name' => $name]);
        if ($result === false) {
            return false;
        }
        TagDependency::invalidate(\Yii::$app->cache, $this->cacheTag);
        return true;
    }
    /**
     * 解析数组类型配置
     * @param $type
     * @param $value
     * @return array
     */
    private static function _parse($type, $value)
    {
        switch ($type) {
            case ConfigModel::TYPE_ARRAY:
                $return = [];
                foreach (explode("\r\n", $value) as $val) {
                    if (strpos($val, '=>') !== false) {
                        list($k, $v) = explode('=>', $val);
                        $return[$k] = $v;
                    } else {
                        $return[] = $val;
                    }
                }
                $value = $return;
                break;
        }

        return $value;
    }


    public function getConfigFromLocal()
    {
        $config = require ($this->localConfigFile);

        if (! is_array($config))
            return [];
        return $config;
    }

    /**
     * Sets configuration into the file
     *
     * @param array $config
     */
    public function setConfigToLocal($config = [])
    {
        $content = "<" . "?php return ";
        $content .= VarDumper::export($config);
        $content .= ";";

        file_put_contents($this->localConfigFile, $content);
    }
}
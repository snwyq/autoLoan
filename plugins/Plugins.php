<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/4
 * Time: 下午12:28
 */

namespace plugins;

use common\components\PackageInfo;
use rbac\models\Menu;
use Yii;
use yii\helpers\Json;
use yii\web\View;
use ReflectionClass;
use yii\base\InvalidParamException;
use common\models\Module;
use yii\base\BootstrapInterface;
use rbac\components\MenuHelper;

abstract class Plugins extends PackageInfo implements BootstrapInterface
{
    private $_config = [];

    public $info = [
        'author' => '',
        'version' => '',
        'name' => '',
        'title' => '',
        'desc' => ''
    ];

    public $aliases = [];
    /**
     * @var string 模块所属应用ID(frontend,backend,wechat,api)
     */
    public $app = 'app-backend';
    /**
     * @var string 配置文件名
     */
    public $configFile = '';

    public function init()
    {
        if (empty($this->configFile)) {
            $class = new ReflectionClass($this);
            $this->configFile = dirname($class->getFileName()) . DIRECTORY_SEPARATOR . 'config.php';

        }
    }
    final public function checkInfo(){
        $info_check_keys = ['id','name','description','author','version'];
        foreach ($info_check_keys as $value) {
            if(!array_key_exists($value, $this->info))
                return false;
        }
        return true;
    }

    /**
     * 获取插件初始配置
     * @return array|mixed
     */
    final public function getInitConfig()
    {
        if (is_file($this->configFile)) {
            $this->_config = include $this->configFile;
        }
        return $this->_config;
    }

    /**
     * 获取插件当前配置
     * @return array|mixed
     */
    final public function getConfig()
    {
        $cacheKey = 'pluginConfig-' . $this->info['name'];
        $c = Yii::$app->cache->get($cacheKey);
        if ($c === false) {
            $name = $this->info['name'];
            $model = Module::find()->where(['name' => $name])->one();
            $configs = Json::decode($model->config);
            $c = [];
            if (!empty($configs)) {
                foreach ($configs as $k => $config) {
                    $c[$config['name']] = $config['value'];
                }
            }
            Yii::$app->cache->set($cacheKey, $c);
        }
        return $c;
    }
    /**
     * 在菜单插件管理下添加一个新菜单
     * @param $name
     * @param $route
     * @throws \yii\db\Exception
     */
    public function addMenu($name, $route)
    {
        $id = \Yii::$app->db->createCommand('SELECT `id` FROM {{%menu}} WHERE `name`="插件" AND `parent` IS NULL')->queryScalar();
        $model = new Menu();
        $model->name = $name;
        $model->route = $route;
        $model->parent = $id;
        $model->save();
        MenuHelper::invalidate();
    }

    /**
     * 删除一个插件管理下的子菜单
     * @param $name
     * @throws \yii\db\Exception
     */
    public function deleteMenu($name)
    {
        \Yii::$app->db->createCommand("DELETE FROM {{%menu}} WHERE `name`='{$name}'")->execute();
        MenuHelper::invalidate();
    }

    /**
     * 安装插件时候执行
     * 比如后台添加菜单,建表等
     */
    public function install()
    {
        if ($this->checkInfo()) {
            $model = Module::find()->where(['id' => $this->getPackage()])->one();
            if (empty($model)) {
                $model = new Module();
                $model->attributes = $this->info;
                $model->type = Module::TYPE_PLUGIN;
                $model->config = Json::encode($this->getInitConfig());
            } else {
                $model->status = Module::STATUS_OPEN;
            }
            return $model->save();
        }
        return false;
    }

    //卸载
    public function uninstall()
    {
        $model = Module::find()->where(['id' => $this->getPackage()])->one();
        $model->status = Module::STATUS_UNINSTALL;
        $model->save();
    }

    public function upgrade()
    {

    }
    /**
     * 各插件在系统bootstrap阶段执行,前台执行frontend方法,后台执行backend方法.
     * 比如插件要在后台添加一个控制器,则可以这样写
     * ```
        public function backend($app)
        {
            $app->controllerMap['donation'] = [
                'class' => '\plugins\donation\controllers\AdminController',
                'viewPath' => '@plugins/donation/views/admin'
            ];
        }
     * ```
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        if ($app->id == 'app-backend' && $this->hasMethod('backend')) {
            $this->backend($app);
        } else if($app->id == 'app-frontend' && $this->hasMethod('frontend')){
            $this->frontend($app);
        } else if($app->id == 'app-wechat' && $this->hasMethod('wechat')){
            $this->wechat($app);
        }
    }


    private $_view;

    /**
     * Returns the view object that can be used to render views or view files.
     * The [[render()]] and [[renderFile()]] methods will use
     * this view object to implement the actual view rendering.
     * If not set, it will default to the "view" application component.
     * @return \yii\web\View the view object that can be used to render views or view files.
     */
    public function getView()
    {
        if ($this->_view === null) {
            $this->_view = Yii::$app->getView();
        }

        return $this->_view;
    }

    /**
     * Sets the view object to be used by this widget.
     * @param View $view the view object that can be used to render views or view files.
     */
    public function setView($view)
    {
        $this->_view = $view;
    }
    /**
     * Renders a view.
     * The view to be rendered can be specified in one of the following formats:
     *
     * - path alias (e.g. "@app/views/site/index");
     * - absolute path within application (e.g. "//site/index"): the view name starts with double slashes.
     *   The actual view file will be looked for under the [[Application::viewPath|view path]] of the application.
     * - absolute path within module (e.g. "/site/index"): the view name starts with a single slash.
     *   The actual view file will be looked for under the [[Module::viewPath|view path]] of the currently
     *   active module.
     * - relative path (e.g. "index"): the actual view file will be looked for under [[viewPath]].
     *
     * If the view name does not contain a file extension, it will use the default one `.php`.
     *
     * @param string $view the view name.
     * @param array $params the parameters (name-value pairs) that should be made available in the view.
     * @return string the rendering result.
     * @throws InvalidParamException if the view file does not exist.
     */
    public function render($view, $params = [])
    {
        return $this->getView()->render($view, $params, $this);
    }

    /**
     * Renders a view file.
     * @param string $file the view file to be rendered. This can be either a file path or a path alias.
     * @param array $params the parameters (name-value pairs) that should be made available in the view.
     * @return string the rendering result.
     * @throws InvalidParamException if the view file does not exist.
     */
    public function renderFile($file, $params = [])
    {
        return $this->getView()->renderFile($file, $params, $this);
    }

    /**
     * Returns the directory containing the view files for this widget.
     * The default implementation returns the 'views' subdirectory under the directory containing the widget class file.
     * @return string the directory containing the view files for this widget.
     */
    public function getViewPath()
    {
        $class = new ReflectionClass($this);

        return dirname($class->getFileName()) . DIRECTORY_SEPARATOR . 'views';
    }

    private $_model;
    public function getModel()
    {
        if ($this->_model == null) {
            $model = Module::findOne($this->getPackage());
            if ($model == null) {
                $model = new Module();
                $model->loadDefaultValues();
                $model->id = $this->getPackage();
            }
            $this->_model = $model;
        }
        return $this->_model;
    }
    public function getInstall()
    {
        return $this->getModel()->getInstall();
    }
    public function getOpen()
    {
        return $this->getModel()->getOpen();
    }
    public function canUninstall()
    {
        return $this->getModel()->install === true;
    }

    public function canInstall()
    {
        return $this->getModel()->install ===  false;
    }

}
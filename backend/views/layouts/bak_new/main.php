<?php
use yii\helpers\Html;
use rbac\models\Menu;
use rbac\components\MenuHelper;

/* @var $this \yii\web\View */
/* @var $content string */

backend\assets\AppAsset::register($this);
\common\assets\PaceAsset::register($this);
if (!isset($this->params['menuGroup'])) {
    $route = '/' . $this->context->uniqueId . '/' . $this->context->defaultAction;
    $menu = Menu::findOne(['route' => $route]);
    if ($menu != null) {
        $groupMenu = Menu::findOne(['id' => $menu->parent, 'parent' => null]);
        $this->params['menuGroup'] = $groupMenu->name;
    }
}
$allMenus = MenuHelper::getAssignedMenu(Yii::$app->user->id);
$label = '';
// 找menuGroup
if (isset($this->params['menuGroup'])) {
    $groupMenu = rbac\models\Menu::findOne(['name' => $this->params['menuGroup'], 'parent' => null]);
    $navs = MenuHelper::getAssignedMenu(\Yii::$app->user->id, $groupMenu['id']);
    $menu = MenuHelper::getFirstMenu($navs);
    $label = $menu['label'];
} else {
    $route = '/' . Yii::$app->requestedRoute;
    $menu = rbac\models\Menu::findOne(['route' => $route]);
    if(!empty($menu)) {
        $label = $menu->name;
    }
}
$leftMenuItems = MenuHelper::getSiblingsMenu($label, $allMenus);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition <?= Yii::$app->config->get('BACKEND_SKIN', 'skin-green') ?> sidebar-mini fixed">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render(
        'header.php'
    ) ?>

    <?= $this->render(
        'left.php',
        [
            'leftMenuItems' => $leftMenuItems
        ]
    )
    ?>

    <?= $this->render(
        'content.php',
        ['content' => $content]
    ) ?>

</div>
<?php $this->endBody() ?>
<?php if (isset($this->blocks['js'])): ?>
    <?= $this->blocks['js'] ?>
<?php endif; ?>
</body>
</html>
<?php $this->endPage() ?>
<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/7/12
 * Time: 下午12:06
 */

namespace common\modules\auto\widgets;


use yii\web\AssetBundle;

class AutoAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/auto/widgets/assets';

    public $js = [
        'auto.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
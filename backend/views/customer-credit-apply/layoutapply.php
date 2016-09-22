<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use common\modules\user\models\User;
use yii\bootstrap\Nav;
use yii\web\View;

/**
 * @var View $this
 * @var User $user
 * @var string $content
 */

$this->title = '授信申请' . '   (借款企业id:' . $customer->id . ') -----  ' . $customer->name;

?>


<div class="row">
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-body no-padding">
                <?= Nav::widget([
                    'options' => [
                        'class' => 'nav nav-pills nav-stacked',
                    ],
                    'items' => [
                        ['label' => '<i class="fa fa-user"></i> ' . Yii::t('app', '申请信息'), 'url' => ['/customer-credit-apply/update', 'id' => $model->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> ' . Yii::t('app', '申请附件'), 'url' => ['/customer-credit-apply/credit-file', 'id' => $model->id], 'encode' => false],

                    ],
                ]) ?>
            </div>
        </div>


        <div class="box box-primary">

            <div class="box-body">

                <div class="box box-solid">
                    <div class="box-body no-padding">
                        <h4>
                            <small>订单状态:</small><?= \common\models\CustomerCreditApply::getStatus()[$model->status] ?>
                        </h4>
                        <h4>
                            <?= \yii\helpers\Html::a('提报', ['tibao', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
                        </h4>

                        <Ul>
                            <hr>
                            <li>1 当状态“未提报”1 时，按纽为 提报。内容可以更改。 点击后状态更改为“初审中” 值为3 ，表单不可以再更改。</li>
                            <li> 2 当状态“待修改”2 时，按纽为 “重新提报。 内容可以更改。 点击后状态更改为“初审中” 值为3 ，表单不可以再更改。</li>
                            <li> 3 当状态“初审中3 ”时，无 按纽，信息不可更改 。</li>
                            <li> 4 当状态“背调中4 ”时，无 按纽，信息不可更改 。</li>
                            <li> 5 当状态“否决 ”时， 无 按纽，信息不可更改 。</li>
                            <li> 6 当状态“通过 ”时， 无 按纽，信息不可更改 。</li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

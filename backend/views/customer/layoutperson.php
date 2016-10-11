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
 * @var View 	$this
 * @var User 	$user
 * @var string 	$content
 */

$this->title = '借款人资料'.'   (借款人id:'.$customer->id.') -----  '.$customer->name;

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
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '帐号信息'),   'url' => ['/customer/update-person', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '客户档案'),   'url' => ['/customer/customer-profile', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '家庭成员'),   'url' => ['/customer/family-member-list', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '工作经历'),   'url' => ['/customer/person-work-list', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '名下汽车'),   'url' => ['/customer/family-car-list', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '名下房产'),   'url' => ['/customer/family-house-list', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '名下借记卡'), 'url' => ['/customer/family-debitcard-list', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '家庭收入'),   'url' => ['/customer/family-income-list', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-user"></i> '. Yii::t('app', '家庭支出'),   'url' => ['/customer/family-pay-list', 'id' => $customer->id], 'encode' => false],
                        ['label' => '<i class="fa fa-file-text-o"></i> '. Yii::t('app', 'Profile details'), 'url' => ['/user/admin/update-profile', 'id' => $customer->id], 'encode' => false],
                        [
                            'label' => '<span class="glyphicon glyphicon-hand-left"></span> ' . Yii::t('app', 'Assignments'),
                            'url' => ['/user/admin/assignments', 'id' => $customer->id],
                            'visible' => Yii::$app->getModule("rbac"),
                            'encode' => false
                        ],

                    ],
                ]) ?>
            </div>
        </div>

        <div class="box box-solid">
            <div class="box-body no-padding">
                <?= Nav::widget([
                    'options' => [
                        'class' => 'nav nav-pills nav-stacked',
                    ],
                    'items' => [
                        [
                            'label' => '<i class="fa fa-hand-paper-o"></i> '.Yii::t('app', 'Confirm'),
                            'url'   => ['/user/admin/confirm', 'id' => $customer->id],
                            'visible' => 1,  !$customer->isConfirmed,
                            'linkOptions' => [
                                'class' => 'text-success',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('app', 'Are you sure you want to confirm this user?'),
                            ],
                            'encode' => false
                        ],
                        [
                            'label' => '<i class="fa   fa-ban "></i> '.Yii::t('app', 'Block'),
                            'url'   => ['/user/admin/block', 'id' => $customer->id],
                            'visible' => !$customer->isBlocked,
                            'linkOptions' => [
                                'class' => 'text-danger',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('app', 'Are you sure you want to block this user?'),
                            ],
                            'encode' => false
                        ],
                        [
                            'label' => '<i class="fa fa-check"></i> '.Yii::t('app', 'Unblock'),
                            'url'   => ['/user/admin/block', 'id' => $customer->id],
                            'visible' => $customer->isBlocked,
                            'linkOptions' => [
                                'class' => 'text-success',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('app', 'Are you sure you want to unblock this user?'),
                            ],
                            'encode' => false
                        ],
                        [
                            'label' =>'<i class="fa fa-trash-o"></i> '. Yii::t('app', 'Delete'),
                            'url'   => ['/user/admin/delete', 'id' => $customer->id],
                            'linkOptions' => [
                                'class' => 'text-danger',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('app', 'Are you sure you want to delete this user?'),
                            ],
                            'encode' => false
                        ],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-solid">
                <?= $content ?> 
        </div>
    </div>
</div>

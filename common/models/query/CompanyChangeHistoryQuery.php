<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\CompanyChangeHistory]].
 *
 * @see \common\models\CompanyChangeHistory
 */
class CompanyChangeHistoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\CompanyChangeHistory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\CompanyChangeHistory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

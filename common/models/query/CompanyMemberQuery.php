<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\CompanyMember]].
 *
 * @see \common\models\CompanyMember
 */
class CompanyMemberQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\CompanyMember[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\CompanyMember|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

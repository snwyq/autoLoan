<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ProductClass]].
 *
 * @see \common\models\ProductClass
 */
class ProductClassQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ProductClass[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductClass|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

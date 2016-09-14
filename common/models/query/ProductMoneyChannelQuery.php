<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ProductMoneyChannel]].
 *
 * @see \common\models\ProductMoneyChannel
 */
class ProductMoneyChannelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ProductMoneyChannel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductMoneyChannel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

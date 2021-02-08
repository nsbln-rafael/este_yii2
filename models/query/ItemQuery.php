<?php

namespace app\models\query;

use app\models\Item;

/**
 * @see Item
 */
class ItemQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Item[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Item|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

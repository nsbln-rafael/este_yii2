<?php

namespace app\models\query;

use app\models\ItemTag;

/**
 * @see ItemTag
 */
class ItemTagQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return ItemTag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ItemTag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

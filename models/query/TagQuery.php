<?php

namespace app\models\query;

use app\models\Tag;
use yii\db\ActiveQuery;

/**
 * @see Tag
 */
class TagQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return Tag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Tag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

<?php

namespace app\models;

use app\models\query\ItemQuery;
use app\models\query\ItemTagQuery;
use app\models\query\TagQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $item_id
 * @property int $tag_id
 *
 * @property Item $item
 * @property Tag  $tag
 */
class ItemTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['item_id', 'required'],
            ['item_id', 'integer'],
            ['item_id', 'exist', 'skipOnError' => true, 'targetClass' => Item::class, 'targetAttribute' => ['item_id' => 'id']],

            ['tag_id', 'required'],
            ['tag_id', 'integer'],
            ['tag_id', 'exist', 'skipOnError' => true, 'targetClass' => Tag::class, 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Товар',
            'tag_id'  => 'Тег',
        ];
    }

    /**
     * @return ActiveQuery|ItemQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::class, ['id' => 'item_id'])->inverseOf('itemTags');
    }

    /**
     * @return ActiveQuery|TagQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id'])->inverseOf('tagItems');
    }

    /**
     * {@inheritdoc}
     * @return ItemTagQuery
     */
    public static function find()
    {
        return new ItemTagQuery(get_called_class());
    }
}

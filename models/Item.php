<?php

namespace app\models;

use app\models\query\ItemQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * @property int    $id
 * @property string $name
 * @property int    $show_count
 *
 * @property ItemTag[] $itemTags
 * @property Tag[]     $tags
 */
class Item extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 255],

            ['show_count', 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'name'       => 'Наименование',
            'show_count' => 'Просмотры',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ItemQuery
     */
    public static function find()
    {
        return new ItemQuery(get_called_class());
    }

    public function getItemTags()
    {
        return $this->hasMany(ItemTag::class, ['item_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])
            ->via('itemTags');
    }
}

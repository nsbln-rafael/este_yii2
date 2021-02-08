<?php

namespace app\models;

use app\models\query\TagQuery;
use Yii;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 */
class Tag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'   => 'ID',
            'name' => 'Наименование',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TagQuery
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }

    public function getTagItems()
    {
        return $this->hasMany(ItemTag::class, ['tag_id' => 'id']);
    }

    public function getItems()
    {
        return $this->hasMany(Item::class, ['id' => 'item_id'])
            ->via('tagItems');
    }
}

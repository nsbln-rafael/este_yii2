<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

class SearchForm extends Model
{
    public $tagsIncluded;
    public $tagsExcluded;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['tagsIncluded', 'each', 'rule' =>
                [
                    'exist',
                    'targetClass' => Tag::class,
                    'targetAttribute' => 'id'
                ],
            ],

            ['tagsExcluded', 'each', 'rule' =>
                [
                    'exist',
                    'targetClass' => Tag::class,
                    'targetAttribute' => 'id'
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'tagsIncluded' => 'Включить теги',
            'tagsExcluded' => 'Исключить теги',
        ];
    }

    /**
     * @param array $params
     * @return array
     */
    public function search(array $params)
    {
        $this->load($params);

        if (!$this->validate()) {
            return [];
        }

        $itemsExcluded = ItemTag::find()
            ->select('item_id')
            ->distinct()
            ->where(['IN', 'tag_id', $this->tagsExcluded])
            ->column();

        $result = Item::find()
            ->joinWith([
            'tags' => function (ActiveQuery $query) {
                    $query->andWhere((['IN', 'tag.id', $this->tagsIncluded]));
                }
            ])
            ->andWhere(['NOT IN', 'item.id', $itemsExcluded])
            ->all();

        return $result;
    }

    public function getTags()
    {
        $tags = Tag::find()->all();

        return ArrayHelper::map($tags, 'id', 'name');
    }
}

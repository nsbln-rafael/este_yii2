<?php

use yii\db\Migration;

class m210208_141409_seed_item_tag_table extends Migration
{
    private const TABLE_NAME = "item_tag";

    public function safeUp()
    {
        $relations = [
            [1, 2],
            [1, 3],
            [1, 5],
            [2, 1],
            [2, 4],
            [3, 1],
            [3, 4],
            [3, 6],
            [4, 1],
            [4, 6],
        ];

        $this->batchInsert(self::TABLE_NAME,
            ['item_id', 'tag_id'],
            $relations
        );
    }

    public function safeDown()
    {
        $this->delete(self::TABLE_NAME, ['item_id' => range(1,4)]);
    }
}

<?php

use yii\db\Migration;

class m210208_135141_seed_item_table extends Migration
{
    private const TABLE_NAME = "item";

    public function safeUp()
    {
        $items = [
            [1, 'Кроссовки Nike',  5],
            [2, 'Джинсы Levi\'s',  10],
            [3, 'Куртка NORMANN',  0],
            [4, 'Футболка Adidas', 1],
        ];

        $this->batchInsert(self::TABLE_NAME,
            ['id', 'name', 'show_count'],
            $items
        );
    }

    public function safeDown()
    {
        $this->delete(self::TABLE_NAME, ['id' => range(1,4)]);
    }
}

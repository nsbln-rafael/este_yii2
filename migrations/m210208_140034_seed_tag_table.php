<?php

use yii\db\Migration;

class m210208_140034_seed_tag_table extends Migration
{
    private const TABLE_NAME = "tag";

    public function safeUp()
    {
        $tags = [
            [1, 'одежда'],
            [2, 'обувь'],
            [3, 'стиль'],
            [4, 'повседневное'],
            [5, 'черное'],
            [6, 'белое'],
        ];

        $this->batchInsert(self::TABLE_NAME,
            ['id', 'name'],
            $tags
        );
    }

    public function safeDown()
    {
        $this->delete(self::TABLE_NAME, ['id' => range(1,6)]);
    }
}

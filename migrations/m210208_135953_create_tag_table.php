<?php

use yii\db\Migration;

class m210208_135953_create_tag_table extends Migration
{
    private const TABLE_NAME = "tag";

    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'         => $this->primaryKey(),
            'name'       => $this->string()->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}

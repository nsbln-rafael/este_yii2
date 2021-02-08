<?php

use yii\db\Migration;

class m210208_134223_create_item_table extends Migration
{
    private const TABLE_NAME = "item";

    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'         => $this->primaryKey(),
            'name'       => $this->string()->notNull(),
            'show_count' => $this->integer()->notNull()->defaultValue(0)
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}

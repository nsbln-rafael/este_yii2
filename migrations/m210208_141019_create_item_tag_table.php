<?php

use yii\db\Migration;

class m210208_141019_create_item_tag_table extends Migration
{
    private const TABLE_NAME = "item_tag";

    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'item_id' => $this->integer()->notNull(),
            'tag_id'  => $this->integer()->notNull(),
        ]);

        $this->addForeignKey("fk_" . self::TABLE_NAME . "_item", self::TABLE_NAME, "item_id", "item", "id");
        $this->addForeignKey("fk_" . self::TABLE_NAME . "_tag",  self::TABLE_NAME, "tag_id",  "tag",  "id");
    }

    public function safeDown()
    {
        $this->dropForeignKey("fk_" . self::TABLE_NAME . "_item", self::TABLE_NAME);
        $this->dropForeignKey("fk_" . self::TABLE_NAME . "_tag",  self::TABLE_NAME);

        $this->dropTable(self::TABLE_NAME);
    }
}

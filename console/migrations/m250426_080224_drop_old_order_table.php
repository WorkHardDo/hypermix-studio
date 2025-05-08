<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%old_order}}`.
 */
class m250426_080224_drop_old_order_table extends Migration
{
    public function safeUp()
    {
        $this->dropTable('{{%order}}');
    }

    public function safeDown()
    {
        echo "drop_old_order_table cannot be reverted.\n";
        return false;
    }
}
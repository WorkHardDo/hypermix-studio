<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m250426_080530_create_new_order_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id_order' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'service_type' => $this->string()->notNull(),
            'social' => $this->string()->null(),
            'singers' => $this->integer()->notNull(),
            'same_track' => $this->string()->null(),
            'source' => $this->string()->notNull(),
            'tonal' => $this->string()->null(),
            'description' => $this->text()->null(),
            'status' => $this->string()->defaultValue('не оплачен'),
            'price' => $this->integer()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // внешний ключ
        $this->addForeignKey(
            'fk_order_user',
            '{{%order}}',
            'id_user',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_order_user', '{{%order}}');
        $this->dropTable('{{%order}}');
    }
}

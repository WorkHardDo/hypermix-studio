<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m250422_131344_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('{{%order}}', [
    'id' => $this->primaryKey(),
    'user_id' => $this->integer()->notNull(),
    'description' => $this->text()->notNull(),
    'status' => $this->string()->defaultValue('не оплачен'),
    'created_at' => $this->integer()->notNull(),
]);

// Добавим внешний ключ
$this->addForeignKey(
    'fk-order-user_id',
    '{{%order}}',
    'user_id',
    '{{%user}}',
    'id',
    'CASCADE'
);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}

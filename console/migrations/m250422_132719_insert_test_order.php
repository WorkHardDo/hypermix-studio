<?php

use yii\db\Migration;

class m250422_132719_insert_test_order extends Migration
{
    public function safeUp()
    {
        // Получаем ID пользователя
        $userId = (new \yii\db\Query())
            ->select('id')
            ->from('{{%user}}')
            ->where(['username' => 'testuser'])
            ->scalar();

        $this->insert('{{%order}}', [
            'user_id' => $userId,
            'description' => 'Тестовый заказ',
            'status' => 'не оплачен',
            'created_at' => time(),
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%order}}', ['description' => 'Тестовый заказ']);
    }
}
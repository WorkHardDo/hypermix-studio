<?php

use yii\db\Migration;

class m250422_132332_insert_test_user extends Migration
{
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'testuser',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),
            'email' => 'test@example.com',
            'status' => 10,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function safeDown()
    {
        $this->delete('{{%user}}', ['username' => 'testuser']);
    }
}
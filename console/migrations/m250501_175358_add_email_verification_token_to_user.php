<?php

use yii\db\Migration;

class m250501_175358_add_email_verification_token_to_user extends Migration
{
    public function safeUp()
{
    $this->addColumn('{{%user}}', 'email_verification_token', $this->string()->null());
}

public function safeDown()
{
    $this->dropColumn('{{%user}}', 'email_verification_token');
}

}

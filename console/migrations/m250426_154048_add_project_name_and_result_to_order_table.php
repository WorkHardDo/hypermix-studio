<?php

use yii\db\Migration;

class m250426_154048_add_project_name_and_result_to_order_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'project_name', $this->string()->null());
        $this->addColumn('{{%order}}', 'result', $this->string()->null());
    }

    public function safeDown()
    {
        $this->dropColumn('{{%order}}', 'project_name');
        $this->dropColumn('{{%order}}', 'result');
    }
}
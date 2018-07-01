<?php

use yii\db\Migration;

class m180701_130510_create_tasks_table extends Migration
{

    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this -> primaryKey(),
            'title' => $this -> string() -> notNull(),
            'is_completed' => $this -> boolean() -> defaultValue(false),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}

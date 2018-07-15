<?php

use yii\db\Migration;
use yii\db\Expression;

class m180701_130510_create_tasks_table extends Migration{
    public function safeUp(){
      $this->createTable('tasks', [
        'id' => $this -> primaryKey(),
        'title' => $this -> string() -> notNull(),
        'is_completed' => $this -> boolean() -> defaultValue(false),
        'position' => $this -> integer(),
        'created_at' => $this -> timestamp() -> defaultValue(new Expression('NOW()')),
        'updated_at' => $this -> timestamp() -> defaultValue(new Expression('NOW()')),
        'deadline' => $this -> datetime('dd.mm.yyyy hh:mm:ss')
      ]);
    }

    public function safeDown(){
      $this->dropTable('tasks');
    }
}

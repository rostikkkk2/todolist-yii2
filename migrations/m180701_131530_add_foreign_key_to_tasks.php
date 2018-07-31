<?php

use yii\db\Migration;

class m180701_131530_add_foreign_key_to_tasks extends Migration{
  public function safeUp(){
    $this -> addColumn('tasks', 'todolist_id', $this -> integer() -> notNull());
    $this -> addForeignKey(
      'todolistId',
      'tasks',
      'todolist_id',
      'todolists',
      'id',
      'CASCADE',
      'CASCADE'
    );
  }

    public function safeDown(){
      $this -> dropForeignKey(
        'todolistId',
        'tasks'
      );
      $this -> dropColumn('tasks', 'todolist_id');
    }

}

<?php

use yii\db\Migration;

class m180507_200049_create_users_table extends Migration{
    public function safeUp(){
      $this->createTable('users', [
        'id' => $this -> primaryKey(),
        'email' => $this -> string() -> unique() -> notNull(),
        'password' => $this -> string() -> notNull(),
        'auth_key' => $this -> string() -> notNull()
      ]);
    }
    public function safeDown(){
      $this->dropTable('users');
    }
}

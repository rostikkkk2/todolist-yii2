<?php

use yii\db\Migration;

class m180507_200049_create_users_table extends Migration{

    public function safeUp(){
        $this->createTable('users', [
            'id' => $this -> primaryKey(),
            'email' => $this -> string(40) -> unique() -> notNull(),
            'password' => $this -> string(40) -> notNull(),
            'name' => $this -> string(40),
            'avatar' => $this-> string(250),
            'auth_key' => $this -> string() -> notNull()
        ]);
    }
    //does need id_admin?
    //i need create_tasks_table
    public function safeDown(){
        $this->dropTable('users');
    }
}

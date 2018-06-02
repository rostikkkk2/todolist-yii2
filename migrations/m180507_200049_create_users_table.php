<?php

use yii\db\Migration;

class m180507_200049_create_users_table extends Migration{

    public function safeUp(){
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            
        ]);
    }

    public function safeDown(){
        $this->dropTable('users');
    }
}

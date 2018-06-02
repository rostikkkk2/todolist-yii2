<?php

use yii\db\Migration;

class m180507_200231_create_todolists_table extends Migration{

    public function safeUp(){
        $this->createTable('todolists', [
            'id' => $this->primaryKey(),
        ]);
    }

    public function safeDown(){
        $this->dropTable('todolists');
    }
}

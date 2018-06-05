<?php

use yii\db\Migration;

class m180604_201830_add_foreign_key_to_todolists extends Migration{
  public function safeUp(){
    $this -> addColumn('todolists', 'user_id', $this -> integer() -> notNull());
    $this -> addForeignKey(
      'userId',
      'todolists',
      'user_id',
      'users',
      'id',
      'CASCADE',
      'CASCADE'
    );

  }

    public function safeDown(){
      $this -> dropForeignKey(
        'userId',
        'todolists'
      );
      $this -> dropColumn('todolists', 'user_id');
    }

}

<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Todolists;
use Yii;

class Tasks extends ActiveRecord{
  public static function tableName(){
    return 'tasks';
  }

  public function rules(){
    return [
      [['title', 'todolist_id'], 'required'],
      [['is_completed', 'todolist_id'], 'integer'],
      [['title'], 'string', 'max' => 40],
      [['todolist_id'], 'exist', 'skipOnError' => true, 'targetClass' => Todolists::className(), 'targetAttribute' => ['todolist_id' => 'id']],
    ];
  }

  public function attributeLabels(){
    return [
      'id' => 'ID',
      'title' => 'Title',
      'is_completed' => 'Is Completed',
      'todolist_id' => 'Todolist ID',
    ];
  }

  public function getTodolist(){
    return $this -> hasOne(Todolists::className(), ['id' => 'todolist_id']);
  }
}

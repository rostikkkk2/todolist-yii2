<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\User;
use Yii;

class Todolists extends ActiveRecord {
    public static function tableName() {
        return 'todolists';
    }

    public function rules() {
      return [
        [['user_id', 'title'], 'required'],
        [['user_id'], 'integer'],
        [['title'], 'string', 'max' => 40],
        [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
      ];
    }

    public function attributeLabels() {
      return [
        'id' => 'ID',
        'title' => 'Title',
        'user_id' => 'User ID',
      ];
    }

    public function getTasks() {
      return $this -> hasMany(Tasks::className(), ['todolist_id' => 'id']) -> orderBy('position');
    }

    public function getUser(){
      return $this -> hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function saveTodolist() {
      $model = new self;
      $model -> user_id = Yii::$app -> user -> id;
      $model -> title = 'Todo List';
      return $model -> save();
    }
}

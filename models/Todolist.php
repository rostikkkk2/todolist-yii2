<?php

namespace app\models;
use yii\db\ActiveRecord;
use app\models\User;
use Yii;

class Todolist extends ActiveRecord{
    public static function tableName(){
        return 'todolists';
    }

    public static function saveTodolist() {
      $model = new self;
      $model -> user_id = Yii::$app -> user -> id;
      $model -> title = 'Todo List';
      return $model -> save();
    }

    public function rules(){
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels(){
        return [
            'id' => 'ID',
            'title' => 'Title',
            'user_id' => 'User ID',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}

<?php
namespace app\models;
use app\models\Todolist;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

class User extends ActiveRecord implements IdentityInterface {
    public static function tableName(){
      return 'users';
    }

    public static function findIdentity($id) {
      return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
      return true;
    }

    public static function findByEmail($email) {
      return self::findOne(compact('email'));
    }

    public function getId() {
        return $this -> id;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }
    public function getTodolists(){
      return $this -> hasMany(Todolist::className(), ['user_id' => 'id']);
    }
    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }
    public function validatePassword($password) {
      return Yii::$app -> getSecurity() -> validatePassword($password, $this -> password);
    }
}

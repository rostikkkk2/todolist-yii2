<?php
  namespace app\models;

  use Yii;
  use yii\base\Model;
  use app\models\User;

  class RegistrationForm extends Model {

    public $email;
    public $password;
    public $confirm_password;


    public function rules(){
      return [
        ['email', 'email'],
        [['password','email','confirm_password'], 'required'],
        ['email', 'unique', 'targetClass' => '\app\models\User'],
        ['confirm_password', 'compare', 'compareAttribute' => 'password'],
        [['auth_key'], 'safe']
      ];
    }

    public function registrate(){
      if ($this -> validate()) {
        $user = new User;
        $user -> email = $this -> email;
        $user -> password = Yii::$app -> getSecurity() -> generatePasswordHash($this -> password);
        $user -> auth_key = Yii::$app -> getSecurity() -> generateRandomString(32);
        $user -> save();
        return true;
      }
    }
  }

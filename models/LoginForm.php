<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model{
    public $email;
    public $password;
    public $rememberMe = true;

    public function rules(){
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'],
            ['rememberMe', 'boolean']
        ];
    }

    public function validatePassword($attribute, $params){
      if (!$this -> hasErrors()) {
           $user = User::findByEmail($this -> email);
           if (!$user || !$user->validatePassword($this->password)) {
               $this->addError($attribute, 'Неверный логин или пароль');
           }
       }
    }

    public function login() {
      $user = User::findByEmail($this -> email);
      if ($this->validate()) {
          return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
      }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}

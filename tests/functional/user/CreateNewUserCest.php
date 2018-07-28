<?php
use app\modules\User;

class CreateNewUserCest{
  public function _before(\FunctionalTester $I){
    $I -> amOnPage('user/new');
  }

  public function submitFormWithIncorrectAll(\FunctionalTester $I){
    $I -> see('Registration');
    $I -> submitForm('#registration', []);
    // $I -> expectTo('see that all inputs is wrong');
    $I -> see('Необходимо заполнить «Email».');
    // $I -> see('Необходимо заполнить «Password».');
    // $I -> see('Необходимо заполнить «Confirm Password».');
  }

}


 ?>

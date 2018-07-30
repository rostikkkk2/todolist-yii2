The project name: todolist-yii2
SQL task is in folder todolist-yii2/sql.txt

Server name: http://142.93.29.48/

The project wrought on framework: Yii2
Include: bootstrap, jquery, scss

How to install project:
  git clone https://github.com/rostikkkk2/todolist-yii2.git
Then go to folder todolist-yii2 and wright:
  git checkout todolist
You need to update composer:
  you must be in folder todolist-yii2 and wright
  composer
  composer update(if composer gives error you need wright: composer update --ignore-platform-reqs)
Altho you must install npm packages:
  npm install  
Then you need to create sql tables:
  you have to enter in sql and create table: todolist-yii
  then enter in composer and wright:
  php yii migrate/up
You need to compile css file:
  npm run watch (and change something in scss file)

Author name: Rostik Yuriev
Email: yourievrostik@gmail.com

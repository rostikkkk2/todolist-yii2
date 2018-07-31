<?php
$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/test_db.php';

return [
  'id' => 'basic-tests',
  'basePath' => dirname(__DIR__),
  'aliases' => [
      '@bower' => '@vendor/bower-asset',
      '@npm'   => '@vendor/npm-asset',
  ],
  'language' => 'en-US',
  'layout' => 'basic',
  'components' => [
      'db' => $db,
      'mailer' => [
          'useFileTransport' => true,
      ],
      'assetManager' => [
          'basePath' => __DIR__ . '/../web/assets',
      ],
      'urlManager' => [
          'enablePrettyUrl' => true,
          'showScriptName' => false,
          'rules' => [
            '' => '/todolist/index',
            '<controller:w+>/<id:d+>' => '<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:w+>/<action:w+>' => '<controller>/<action>',
          ],
      ],
      'user' => [
          'identityClass' => 'app\models\User',
      ],
      'request' => [
          'cookieValidationKey' => 'test',
          'enableCsrfValidation' => false,
      ],
  ],
  'params' => $params,
];

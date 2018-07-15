<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
  'id' => 'basic',
  'basePath' => dirname(__DIR__),
  'bootstrap' => ['log'],
  'language' => 'ru',
  'layout' => 'basic',
  'aliases' => [
      '@bower' => '@vendor/bower-asset',
      '@npm'   => '@vendor/npm-asset',
  ],
  'components' => [
    'authManager' => [
           'class' => 'yii\rbac\DbManager',
       ],
      'request' => [
        'baseUrl' => '',
        'cookieValidationKey' => '94m4LcCBmt7g35LYik_TegAUoTTeU54E',
      ],
      'cache' => [
          'class' => 'yii\caching\FileCache',
      ],
      'user' => [
          'identityClass' => 'app\models\User',
          'enableAutoLogin' => true,
          'loginUrl' => ['user/enter']
      ],
      'errorHandler' => [
          'errorAction' => 'error/error',
      ],
      'mailer' => [
          'class' => 'yii\swiftmailer\Mailer',
          'useFileTransport' => true,
      ],
      'log' => [
          'traceLevel' => YII_DEBUG ? 3 : 0,
          'targets' => [
              [
                  'class' => 'yii\log\FileTarget',
                  'levels' => ['error', 'warning'],
              ],
          ],
      ],
      'db' => $db,

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

  ],
  'params' => $params,
];

if (YII_ENV_DEV) {
  $config['bootstrap'][] = 'debug';
  $config['modules']['debug'] = [
      'class' => 'yii\debug\Module',
  ];

  $config['bootstrap'][] = 'gii';
  $config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
  ];
}

return $config;

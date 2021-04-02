<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'audit'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    'controllerMap' => [
            'fixture' => [
                'class' => 'yii\console\controllers\FixtureController',
                'namespace' => 'app\tests\fixtures'
            ],
            'migrate' => [
                'class' => \yii\console\controllers\MigrateController::class,
                'migrationPath' => [
                    '@app/migrations',
                    '@app/modules/common/migrations',
                    '@app/modules/actividad/migrations'
                ],
                'migrationNamespaces'=>[
                    'Da\User\Migration'
                ]
            ],        
        ]
];

return $config;

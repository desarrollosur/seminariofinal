<?php

$params = array_merge(
        require(__DIR__ . '/params.php')
);
$config = [
    'language' => 'es',
    'aliases'=>[
        '@archivos' => '@app/_files',
    ],
    'name'=>'Efip Uno',
    'modules' => [
        'agenda' => [
            'class' => 'app\modules\agenda\Agenda',
        ],        
        'api' => [
            'class' => 'app\modules\api\Api',
        ],
        'common' => [
            'class' => 'app\modules\common\Common',
        ],        
        'user' => [
            'class' => Da\User\Module::class,
            'administrators'=>$params['adminUser'],
            'classMap' => [
                'User' => app\models\User::class,
            ],        
        ],        
        'audit' => [
            'class' => 'bedezign\yii2\audit\Audit',
            'ignoreActions' => ['audit/*', 'debug/*'],
            'userIdentifierCallback' => ['app\models\User', 'userIdentifierCallback'],
            'userFilterCallback' => ['app\models\User', 'userFilterCallback'],            
            'logConfig'=>[
                'levels'=>YII_DEBUG?['error','warning','info','trace','profile']:['error','warning'],
            ],            'maxAge' => '14',
            'maxAge' => '14',
        ]
    ],    
    'components'=>[
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => $params['emailFileTransport'], //set this property to false to send mails to real email addresses
            //comment the following array to send mail using php's mail function
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => $params['mailHost'],
                'username' => $params['mailUser'],
                'password' => $params['mailPass'],
                'port' => $params['mailPort'],
                'encryption' => 'tls',
                'timeout' => 2000 //segundos                
            ]
        ],
        'authManager'=>[
            'class'=>'Da\User\Component\AuthDbManagerComponent'
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap'        => [
                        'cruds' => 'crud.php',
                    ],
                ],
            ],
        ],        
    ]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment

    $config['bootstrap'][] = 'gii';
    $config['modules']['audit']['accessIps']= null;
    $config['modules']['audit']['accessRoles']= null;
    $config['modules']['audit']['accessUsers']= null;
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
        'generators' => [
            'fixture' => [
                'class' => 'elisdn\gii\fixture\Generator',
            ]
         ]        
    ];
}

return $config;
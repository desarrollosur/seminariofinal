<?php
$paramsdb = array_merge(
        require(__DIR__ . '/params.php')
);

return [
    'class'    => 'yii\db\Connection',

    'dsn'      => $paramsdb['dbURL'], 
    'username' => $paramsdb['dbUser'],
    'password' => $paramsdb['dbPass'], 
    'charset'   => 'utf8',
    'enableSchemaCache' => $paramsdb['runMode']==='prod',
    'schemaCacheDuration' => 43200,    
];

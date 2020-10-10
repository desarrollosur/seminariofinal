<?php

return [
    'adminEmail' => 'desarrollosur@yahoo.com.ar',
    'JWT_EXPIRE' => time() - 1, // expirado
    'JWT_SECRET' => getenv('JWT_SECRET') ? getenv('JWT_SECRET') : '123456',
    # Build info
    'buildId' => getenv('BUILD_ID') ? getenv('BUILD_ID') : 'Filesystem',
    'buildUrl' => getenv('BUILD_URL') ? getenv('BUILD_URL') : '',
    'buildTime' => getenv('BUILD_TIME') ? getenv('BUILD_TIME') : 'Ahora',
    'revision' => getenv('REVISION') ? getenv('REVISION') : '',
    # Env params    
    'host' => getenv('NODE') ? getenv('NODE') : 'Local Dev',
    'runMode' => getenv('RUN_MODE') ? getenv('RUN_MODE') : 'dev',
    # Database
    'dbURL' => getenv('DB_URL') ? getenv('DB_URL') : 'pgsql:host=postgres;port=5432;dbname=seminariofinal',
    'dbUser' => getenv('DB_USER') ? getenv('DB_USER') : 'postgres',
    'dbPass' => getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : 'seminariofinal',
    'emailFileTransport' => getenv('EMAIL_MODE') ? getenv('EMAIL_MODE')=='file' : false,
    'mailHost' => 'server2.jusrionegro.gov.ar',
    'mailUser' => getenv('MAIL_USER') ? getenv('MAIL_USER') : 'desarrollosur@yahoo.com.ar',
    'mailPass' => getenv('MAIL_PASS') ? getenv('MAIL_PASS') : '',
    'mailPort' => getenv('MAIL_PORT') ? getenv('MAIL_PORT') : '25',
    'adminUser'=> getenv('ADMIN_USER')?[getenv('ADMIN_USER')]:['mariano']
];

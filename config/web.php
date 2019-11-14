<?php

return [
    'id' => 'crmapp',
    'basePath' => realpath(__DIR__ . '/../'),
    //'basePath' => dirname(__DIR__),
    'components' => [
        'request' => [
            'cookieValidationKey' => '1021c636f4ae69fb3eb71c66441c9458',
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>'              => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'          => '<controller>/<action>',
            ],
        ]
        ],
    'modules' => [
        'attachments' => [
            'class' => 'nemmo\attachments\Module',
            'tempPath' => '@app/uploads/temp',
            'storePath' => '@app/uploads/store',
            'rules' => [ // Rules according to the FileValidator
                'maxFiles' => 1, // Allow to upload maximum 3 files, default to 3
                
                'maxSize' => 1024 * 1024 // 1 MB
            ],
            'tableName' => '{{%attachments}}' // Optional, default to 'attach_file'
        ],
        'gii'=>[
            'class' => 'yii\gii\Module',
            'allowedIPs' => ['*'],
    
            // or allow localhost only
            // 'allowedIPs' => ['127.0.0.1', '::1'],
        ]
    ],
    
];
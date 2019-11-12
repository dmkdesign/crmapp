<?php
return [
    'id' => 'crmapp',
    'basePath' => realpath(__DIR__ . '/../'),
    'components' => [
        'request' => [
            'cookieValidationKey' => '1021c636f4ae69fb3eb71c66441c9458',
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false
        ]
        ],
    'modules' => [
            'attachments' => [
            'class' => nemmo\attachments\Module::className(),
            'tempPath' => '@app/uploads/temp',
            'storePath' => '@app/uploads/store',
            'rules' => [ // Rules according to the FileValidator
                'maxFiles' => 1, // Allow to upload maximum 3 files, default to 3
                'mimeTypes' => 'image/png', // Only png images
                'maxSize' => 1024 * 1024 // 1 MB
            ],
            'tableName' => '{{%attachments}}' // Optional, default to 'attach_file'
        ]
    ],
    // 'controllerMap' => [
    //     'migrate' => [
    //         'class' => 'yii\console\controllers\MigrateController',
    //         'migrationNamespaces' => [
    //             'nemmo\attachments\migrations',
    //         ],
    //     ],
    // ],
];
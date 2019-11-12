<?php
return [
    'id' => 'crmapp-console',
    'basePath' => dirname(__DIR__),
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
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
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                'nemmo\attachments\migrations',
            ],
        ],
    ],
];
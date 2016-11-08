<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'timeZone' => 'Europe/Moscow',
            'dateFormat' => 'd.MM.Y',
            'timeFormat' => 'H:mm:ss',
            'datetimeFormat' => 'php:Y-m-d H:i:s',
        ],
        /*
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ]*/ // @TODO RBAC
    ],
];

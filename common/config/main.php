<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'aliases' => [
        '@image_affiliate_company' => 'upload/image_affiliate_company',
        '@image_banner' => 'upload/image_banner',
        '@image_new' => 'upload/image_news',
    ],
];

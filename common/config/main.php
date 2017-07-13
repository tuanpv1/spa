<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'caovanminhhumg@gmail.com',
                'password' => 'caovanminh',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
    'aliases' => [
        '@image_affiliate_company' => 'upload/image_affiliate_company',
        '@image_banner' => 'upload/image_banner',
        '@image_new' => 'upload/image_news',
    ],
];

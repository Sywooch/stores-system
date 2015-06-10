<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
	'homeUrl' => '/store/map',
    'defaultRoute' => '/store/map',
	'name' => 'Торгові точки',
    'bootstrap' => ['log'],
    'language' => 'ua_UA',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'all_you_touch_and_all_you_see_it\'s_all_you_life_will_ever_be',
        ],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'i18n'=>array(
            'translations' => array(
                'app*'=>array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@app/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'app'=>'app.php',
                    )
                ),
                'yii'=>array(
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => "@app/messages",
                    'sourceLanguage' => 'en_US',
                    'fileMap' => array(
                        'yii'=>'yii.php',
                    )
                )
            )
        ),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;

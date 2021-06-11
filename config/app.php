<?php
/**
 * Yii Application Config
 *
 * Edit this file at your own risk!
 *
 * The array returned by this file will get merged with
 * vendor/craftcms/cms/src/config/app.php and app.[web|console].php, when
 * Craft's bootstrap script is defining the configuration for the entire
 * application.
 *
 * You can define custom modules and system components, and even override the
 * built-in system components.
 *
 * If you want to modify the application config for *only* web requests or
 * *only* console requests, create an app.web.php or app.console.php file in
 * your config/ folder, alongside this one.
 */

use craft\helpers\App;

$appId = App::env('APP_ID') ?: 'CraftCMS';

$redis = App::env('REDIS_URL');
// $redisTls = App::env('REDIS_TLS_URL'); // Causes error? "Failed to write to socket."
$redisEither = !empty($redisTls) && $redisTls !== '' ? $redisTls : $redis;
preg_match(
    '|rediss?://:([a-z0-9]*)@([^:]*):([0-9]*)|i',
    $redisEither,
    $matches
);
$password = $matches[1];
$server = $matches[2];
$port = $matches[3];

return [
    'id' => $appId,
    'modules' => [
        'my-module' => \modules\Module::class,
    ],
    'bootstrap' => ['my-module'],
    'components' => [
        'redis' => [
            'class' => yii\redis\Connection::class,
            'hostname' => $server,
            'port' => $port,
            'password' => $password,
        ],
        'cache' => [
            'class' => yii\redis\Cache::class,
            'defaultDuration' => 86400,
            'keyPrefix' => $appId,
        ],
    ],
];
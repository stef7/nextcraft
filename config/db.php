<?php
/**
 * Database Configuration
 *
 * All of your system's database connection settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/DbConfig.php.
 *
 * @see craft\config\DbConfig
 */

use craft\helpers\App;

// https://dev.to/coda/how-to-deploy-craft-cms-with-postgres-on-heroku-1c2h

preg_match(
    '|postgres://([a-z0-9]*):([a-z0-9]*)@([^:]*):([0-9]*)/(.*)|i',
    App::env('DATABASE_URL'),
    $matches
);
$user = $matches[1];
$password = $matches[2];
$server = $matches[3];
$port = $matches[4];
$database = $matches[5];

return [
    'dsn' => null,
    'driver' => 'pgsql',
    'server' => $server,
    'user' => $user,
    'password' => $password,
    'database' => $database,
    'schema' => App::env('DB_SCHEMA'),
    'tablePrefix' => App::env('DB_TABLE_PREFIX'),
    'port' => $port,
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];
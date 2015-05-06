<?php
Environment::configure('development', true, [
], function () {
    // Log settings
    App::uses('CakeLog', 'Log');
    CakeLog::config('debug', array(
        'engine' => 'File',
        'types' => array('notice', 'info', 'debug'),
        'file' => 'debug',
    ));
    CakeLog::config('error', array(
        'engine' => 'File',
        'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
        'file' => 'error',
    ));

    Configure::write('DATABASE_OPTIONS', [
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'root',
        'password' => '',
        'database' => 'local_cake',
        'prefix' => '',
        'encoding' => 'utf8',
    ]);

    Configure::write('TEST_DATABASE_OPTIONS', [
        'datasource' => 'Database/Postgres',
        'persistent' => false,
        'host' => 'localhost',
        'login' => 'shin',
        'password' => '',
        'database' => 'app_test',
    ]);

    // Cache settings
    Cache::config('default', array('engine' => 'File'));
});

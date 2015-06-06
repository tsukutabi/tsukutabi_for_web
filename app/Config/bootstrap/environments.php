

<?php
CakePlugin::load('Environments');
App::uses('Environment', 'Environments.Lib');

include dirname(__FILE__) . DS . 'environments' . DS . 'heroku.php';
include dirname(__FILE__) . DS . 'environments' . DS . 'development.php';

Environment::start();

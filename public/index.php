<?php
chdir(dirname(__DIR__));
require_once('vendor/autoload.php');
$app = Zend\Mvc\Application::init(require_once 'config/application.config.php');
$app->run();

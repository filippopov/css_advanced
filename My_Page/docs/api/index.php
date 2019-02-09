<?php

require_once 'vendor\autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$self = $_SERVER['PHP_SELF'];

$self = str_replace('index.php', '', $self);

$uri = str_replace($self, '', $uri);

$args = explode('/', $uri);

$controllerName = array_shift($args);

$actionName = array_shift($args);

$dbInstanceName = 'default';

\Philip\Popov\Adapter\Database::setInstance(
    \Philip\Popov\Config\DbConfig::DB_HOST,
    \Philip\Popov\Config\DbConfig::DB_USER,
    \Philip\Popov\Config\DbConfig::DB_PASS,
    \Philip\Popov\Config\DbConfig::DB_NAME,
    $dbInstanceName
);

$mvcContext = new \Philip\Popov\Core\MVC\MVCContext($controllerName, $actionName, $self, $args, []);

$app = new \Philip\Popov\Core\Application($mvcContext);

$app->addClass(\Philip\Popov\Core\MVC\MVCContext::class, $mvcContext);
$app->addClass(\Philip\Popov\Adapter\DatabaseInterface::class, \Philip\Popov\Adapter\Database::getInstance($dbInstanceName));


$app->start();
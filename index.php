<?php
/**
 * Router
 */

// Config
require_once('config.php');

// Handle controller
$controllerParam = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : $config['default']['controller'];
if (empty($controllerParam)) {
    throw new \Exception('Error: empty controller');
}
$controllerName = ucwords($controllerParam).'Controller';
$controllerPath = 'controllers/'.$controllerName.'.php';
if (!file_exists($controllerPath)) {
    throw new \Exception('Error: invalid controller');
}
require_once($controllerPath);
$controller = new $controllerName();

// Handle action
$actionParam = isset($_REQUEST['action']) ? $_REQUEST['action'] : $config['default']['action'];
if (empty($actionParam)) {
    throw new \Exception('Error: empty action');
}
$actionName = $actionParam.'Action';
if (!method_exists($controller, $actionName)) {
    throw new \Exception('Error: invalid action');
}

// Dependency Injection Container
require_once('services/Container.php');
$container = new Container($config);
$controller->setContainer($container);

// Execute action
$controller->$actionName();
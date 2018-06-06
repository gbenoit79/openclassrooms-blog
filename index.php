<?php
/**
 * Router (frontend)
 */

// Config
require_once('config.php');

// Execute action
require_once('services/Router.php');
$router = new Router($config);
$router->executeAction(
    isset($_REQUEST['controller']) ? $_REQUEST['controller'] : $config['default']['controller'],
    isset($_REQUEST['action']) ? $_REQUEST['action'] : $config['default']['action'],
    'front'
);
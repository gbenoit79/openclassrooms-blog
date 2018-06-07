<?php
/**
 * Router (frontend)
 */

// Config
require_once('config.php');

// Execute action
require_once('model/Router.php');
$router = new Router($config);
$router->executeAction(
    isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'post',
    isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list',
    'front'
);
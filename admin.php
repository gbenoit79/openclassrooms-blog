<?php
/**
 * Router (backend)
 */

// Config
require_once('config.php');

// Execute action
require_once('model/Router.php');
$router = new Router($config);
try {
    $router->executeAction(
        isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'post',
        isset($_REQUEST['action']) ? $_REQUEST['action'] : 'create',
        'back'
    );
} catch(Exception $e) {
    $viewData['errorMessage'] = $e->getMessage();
    require('view/errorView.php');
}
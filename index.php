<?php
/**
 * Router (frontend)
 */

// Config
require_once('config.php');

// Execute action
require_once('model/Router.php');
$router = new \OpenClassrooms\Blog\Model\Router($config);
try {
    $router->executeAction(
        isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'post',
        isset($_REQUEST['action']) ? $_REQUEST['action'] : 'list',
        'front'
    );
} catch(Exception $e) {
    $viewData['error'] = $e->getMessage();
    require('view/errorView.php');
}
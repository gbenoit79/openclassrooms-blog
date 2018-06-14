<?php
namespace OpenClassrooms\Blog\Model;

/**
 * Router
 */
class Router
{
    protected $config;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    public function getConfig()
    {
        return $this->config;
    }
    public function setConfig(array $config)
    {
        $this->config = $config;
    }
    
    public function executeAction($controllerParam, $actionParam, $envParam)
    {
        // Check params
        if (empty($controllerParam)) {
            throw new \Exception('Empty controller');
        } elseif (empty($actionParam)) {
            throw new \Exception('Empty action');
        }

        // Handle controller
        $controllerName = ucwords($controllerParam).ucwords($envParam).'Controller';
        $controllerPath = __DIR__.'/../controller/'.$controllerName.'.php';
        if (!file_exists($controllerPath)) {
            throw new \Exception('Invalid controller');
        }
        require_once($controllerPath);
        $controllerName = '\OpenClassrooms\Blog\Controller\\'.$controllerName;
        $controller = new $controllerName();

        // Handle action
        $actionName = $actionParam.'Action';
        if (!method_exists($controller, $actionName)) {
            throw new \Exception('Invalid action');
        }

        // Dependency Injection Container
        require_once(__DIR__.'/../model/Container.php');
        $container = new Container($this->getConfig());
        $controller->setContainer($container);

        // Security: to access to backend controllers, you must be an admin
        if ($envParam === 'back') {
            $connectedUser = $container->getUserManager()->getConnectedUser();
            // User not connected
            if (!isset($connectedUser['id'])) {
                // Redirect to login
                header('Location: index.php?controller=user&action=login');
            // User group id 1 is admin
            } elseif (isset($connectedUser['userGroupId']) && $connectedUser['userGroupId'] != 1) {
                // Access denied
                throw new \Exception('Access denied');
            }
        }

        // Execute action
        $controller->$actionName();
    }
}
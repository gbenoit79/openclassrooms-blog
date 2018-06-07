<?php
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

        // Execute action
        $controller->$actionName();
    }
}
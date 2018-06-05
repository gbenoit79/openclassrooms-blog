<?php
require_once(__DIR__.'/../services/Container.php');

/**
 * Base controller
 */
abstract class BaseController
{
    protected $container;
    
    public function getContainer()
    {
        return $this->container;
    }
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    public function initViewData()
    {
        $viewData = [];
        $viewData['title'] = $this->getContainer()->getConfig()['title'];

        return $viewData;
    }

}
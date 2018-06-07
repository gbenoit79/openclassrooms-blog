<?php
namespace OpenClassrooms\Blog\Controller;

require_once(__DIR__.'/../model/Container.php');

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
    public function setContainer(\OpenClassrooms\Blog\Model\Container $container)
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
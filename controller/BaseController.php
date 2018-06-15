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

    /**
     * Handle pagination
     * 
     * @param int $totalItems
     * @return array
     */
    public function handlePagination($totalItems)
    {
        if ($totalItems < 0) {
            throw new \Exception('Invalid total items');
        }
        
        $pagination = [];
        if (isset($_GET['page']) && !empty($_GET['page'])){
            $pagination['currentPage'] = $_GET['page'];
        } else {
            $pagination['currentPage'] = 1;
        }
        $pagination['itemsPerPage'] = $this->getContainer()->getConfig()['itemsPerPage'];
        $pagination['start'] = ($pagination['currentPage'] * $pagination['itemsPerPage']) - $pagination['itemsPerPage'];
        $pagination['totalItems'] = $totalItems;
        $pagination['endPage'] = ceil($pagination['totalItems'] / $pagination['itemsPerPage']);
        $pagination['startPage'] = 1;
        $pagination['nextPage'] = $pagination['currentPage'] + 1;
        $pagination['previousPage'] = $pagination['currentPage'] - 1;
        
        return $pagination;
    }
}
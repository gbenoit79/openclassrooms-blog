<?php
namespace OpenClassrooms\Blog\Controller;

require_once('PostFrontController.php');

/**
 * Post back controller
 */
class PostBackController extends PostFrontController
{
    public function createAction()
    {
        echo 'Ajouter un billet';
    }
}
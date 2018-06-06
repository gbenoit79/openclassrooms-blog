<?php
require_once('BaseController.php');

/**
 * Post front controller
 */
class PostFrontController extends BaseController
{
    public function listAction()
    {
        // Init view data
        $viewData = $this->initViewData();
        $viewData['displayCommentsLink'] = true;

        // Get last 5 posts
        $viewData['postsList'] = $this->getContainer()->getPostService()->getPostsList(5);

        // Display view
        require_once('views/postListView.php');
    }

    public function showAction()
    {
        // Get post id
        $postId = isset($_GET['postId']) ? (int) $_GET['postId'] : 0;
        if ($postId <= 0) {
            throw new \Exception('Error: invalid post id');
        }

        // Init view data
        $viewData = $this->initViewData();

        // Get post
        $viewData['post'] = $this->getContainer()->getPostService()->getPost($postId);

        // Get comments
        $viewData['commentsList'] = $this->getContainer()->getCommentService()->getCommentsList($postId);

        // Display view
        require('views/postShowView.php');
    }
}
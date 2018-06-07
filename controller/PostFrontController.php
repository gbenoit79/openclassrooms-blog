<?php
namespace OpenClassrooms\Blog\Controller;

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
        $viewData['postsList'] = $this->getContainer()->getPostManager()->getPostsList(5);

        // Display view
        require_once('view/front/postListView.php');
    }

    public function showAction()
    {
        // Get post id
        $postId = isset($_GET['postId']) ? (int) $_GET['postId'] : 0;
        if ($postId <= 0) {
            throw new \Exception('Invalid post id');
        }

        // Init view data
        $viewData = $this->initViewData();

        // Get post
        $viewData['post'] = $this->getContainer()->getPostManager()->getPost($postId);

        // Get comments
        $viewData['commentsList'] = $this->getContainer()->getCommentManager()->getCommentsList($postId);

        // Handle error
        if (!empty($_SESSION['errorMessage'])) {
            $viewData['errorMessage'] = $_SESSION['errorMessage'];
            $_SESSION['errorMessage'] = '';
        }

        // Display view
        require('view/front/postShowView.php');
    }
}
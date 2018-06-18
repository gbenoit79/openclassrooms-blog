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

        // Handle pagination
        $totalItems = $this->getContainer()->getPostManager()->getTotalPosts();
        $pagination = $this->handlePagination($totalItems);
        $pagination['url'] = 'index.php?controller=post&action=list';
        $viewData['pagination'] = $pagination;
        
        // Get posts
        $viewData['postsList'] = $this->getContainer()->getPostManager()->getPostsList($pagination['start'], $pagination['itemsPerPage']);

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
        if (empty($viewData['post'])) {
            throw new \Exception('Empty post');
        }

        // Handle pagination
        $totalItems = $this->getContainer()->getCommentManager()->getTotalComments($postId);
        $pagination = $this->handlePagination($totalItems);
        $pagination['url'] = 'index.php?controller=post&action=show&postId='.$postId;
        $viewData['pagination'] = $pagination;

        // Get comments
        $viewData['commentsList'] = $this->getContainer()->getCommentManager()->getCommentsList($postId, $pagination['start'], $pagination['itemsPerPage']);

        // Handle alerts
        foreach (['Success', 'Danger'] as $alertType) {
            $alertName = 'alert'.$alertType;
            if (!empty($_SESSION[$alertName])) {
                $viewData[$alertName] = $_SESSION[$alertName];
                $_SESSION[$alertName] = '';
            }
        }

        // Display view
        require('view/front/postShowView.php');
    }
}
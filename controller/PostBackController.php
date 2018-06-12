<?php
namespace OpenClassrooms\Blog\Controller;

require_once('PostFrontController.php');
require_once(__DIR__.'/../model/Post.php');

/**
 * Post back controller
 */
class PostBackController extends PostFrontController
{
    public function listAction()
    {
        // Init view data
        $viewData = $this->initViewData();

        // Get posts
        $viewData['postsList'] = $this->getContainer()->getPostManager()->getPostsList(10);

        // Display view
        require_once('view/back/postListView.php');
    }

    public function createAction()
    {
        // Instantiate post
        $post = new \OpenClassrooms\Blog\Model\Post();
        $post->setTitle(isset($_POST['title']) ? trim($_POST['title']) : '');
        $post->setContent(isset($_POST['content']) ? trim($_POST['content']) : '');

        // Save post action
        $this->savePostAction($post);
    }

    public function updateAction()
    {
        // Get post id
        $postId = isset($_REQUEST['postId']) ? (int) $_REQUEST['postId'] : 0;
        if ($postId <= 0) {
            throw new \Exception('Invalid post id');
        }

        // Instantiate post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = new \OpenClassrooms\Blog\Model\Post();
            $post->setId($postId);
            $post->setTitle(isset($_POST['title']) ? trim($_POST['title']) : '');
            $post->setContent(isset($_POST['content']) ? trim($_POST['content']) : '');
        } else {
            $post = $this->getContainer()->getPostManager()->getPost($postId);
            if (!$post) {
                throw new \Exception('Post not found');
            }
        }

        // Save post action
        $this->savePostAction($post);
    }

    protected function savePostAction(\OpenClassrooms\Blog\Model\Post $post)
    {
        $action = $post->getId() > 0 ? 'update' : 'create';

        // Init view data
        $viewData = $this->initViewData();
        $viewData['action'] = $action;
        $viewData['post'] = $post;
        $viewData['title'] = ($action === 'create') ? 'Créer un billet' : 'Modifier un billet';

        // Is form posted?
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check post data
            if (empty($post->getTitle())) {
                $viewData['alertDanger'] = 'Titre vide';
            } else if (empty($post->getContent())) {
                $viewData['alertDanger'] = 'Contenu vide';
            // Post data is OK
            } else {
                // Create post
                if ($action === 'create') {
                    $result = $this->getContainer()->getPostManager()->createPost($post);
                // Update post
                } else {
                    $result = $this->getContainer()->getPostManager()->updatePost($post);
                }
                
                // Is post saved successfully?
                if ($result) {
                    // Redirect
                    header('Location: admin.php?controller=post&action=list');
                } else {
                    $viewData['alertDanger'] = 'Problème lors de l\'enregistrement du billet';
                }
            }
        }

        // Display view
        require_once('view/back/post'.ucwords($action).'View.php');
    }

    public function deleteAction()
    {
        // Get post id
        $postId = isset($_REQUEST['postId']) ? (int) $_REQUEST['postId'] : 0;
        if ($postId <= 0) {
            throw new \Exception('Invalid post id');
        }

        // Delete post
        $result = $this->getContainer()->getPostManager()->deletePost($postId);
        if (!$result) {
            throw new \Exception('Cannot delete post');
        }

        // Redirect
        header('Location: admin.php?controller=post&action=list');
    }
}
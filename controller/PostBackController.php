<?php
namespace OpenClassrooms\Blog\Controller;

require_once('PostFrontController.php');
require_once(__DIR__.'/../model/Post.php');

/**
 * Post back controller
 */
class PostBackController extends PostFrontController
{
    public function createAction()
    {
        // Init view data
        $viewData = $this->initViewData();

        // Is form posted?
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check form params
            if (empty($_POST['title'])) {
                $viewData['errorMessage'] = 'Titre vide';
            } else if (empty($_POST['content'])) {
                $viewData['errorMessage'] = 'Contenu vide';
            // Form is OK
            } else {
                // Create post
                $post = new \OpenClassrooms\Blog\Model\Post();
                $post->setTitle(trim($_POST['title']));
                $post->setContent(trim($_POST['content']));
                $result = $this->getContainer()->getPostManager()->createPost($post);

                // Is post created successfully?
                if ($result) {
                    // Redirect
                    header('Location: admin.php?controller=post&action=list');
                } else {
                    $viewData['errorMessage'] = 'Problème lors de la création du billet';
                }
            }
        }

        // Display view
        require_once('view/back/postCreateView.php');
    }
}
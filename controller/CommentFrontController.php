<?php
namespace OpenClassrooms\Blog\Controller;

require_once('BaseController.php');
require_once(__DIR__.'/../model/Comment.php');

/**
 * Comment front controller
 */
class CommentFrontController extends BaseController
{
    public function createAction()
    {
        // Get post id
        $postId = isset($_POST['postId']) ? (int) $_POST['postId'] : 0;
        
        // Check form params
        if (empty($_POST['author'])) {
            $_SESSION['errorMessage'] = 'Pseudo vide';
        } else if (empty($_POST['content'])) {
            $_SESSION['errorMessage'] = 'Commentaire vide';
        // Form is OK
        } else {
            // Create comment
            $comment = new \OpenClassrooms\Blog\Model\Comment();
            $comment->setPostId($postId);
            $comment->setAuthor(trim($_POST['author']));
            $comment->setContent(trim($_POST['content']));
            $result = $this->getContainer()->getCommentManager()->createComment($comment);

            // Is comment created successfully?
            if (!$result) {
                $_SESSION['errorMessage'] = 'Problème lors de la création du billet';
            }
        }
        
        // Redirect
        header('Location: index.php?controller=post&action=show&postId='.$postId);
    }
}
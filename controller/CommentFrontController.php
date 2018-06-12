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
            $_SESSION['alertDanger'] = 'Pseudo vide';
        } else if (empty($_POST['content'])) {
            $_SESSION['alertDanger'] = 'Commentaire vide';
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
                $_SESSION['alertDanger'] = 'Problème lors de la création du billet';
            }
        }
        
        // Redirect
        header('Location: index.php?controller=post&action=show&postId='.$postId);
    }

    public function reportAction()
    {
        // Get post id
        $postId = isset($_REQUEST['postId']) ? (int) $_REQUEST['postId'] : 0;
        if ($postId <= 0) {
            throw new \Exception('Invalid post id');
        }

        // Get comment id
        $commentId = isset($_REQUEST['commentId']) ? (int) $_REQUEST['commentId'] : 0;
        if ($commentId <= 0) {
            throw new \Exception('Invalid comment id');
        }
        
        // Report comment
        $result = $this->getContainer()->getCommentManager()->reportComment($commentId);
        // Is comment reported successfully?
        if (!$result) {
            $_SESSION['alertDanger'] = 'Problème lors du signalement du commentaire';
        } else {
            $_SESSION['alertSuccess'] = 'Commentaire signalé avec succès';
        }
        
        // Redirect
        header('Location: index.php?controller=post&action=show&postId='.$postId);
    }
}
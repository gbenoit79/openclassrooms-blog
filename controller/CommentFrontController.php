<?php
require_once('BaseController.php');
require_once(__DIR__.'/../model/Comment.php');

/**
 * Comment front controller
 */
class CommentFrontController extends BaseController
{
    public function createAction()
    {
        // Create comment
        $postId = isset($_POST['postId']) ? (int) $_POST['postId'] : 0;
        $comment = new Comment();
        $comment->setPostId($postId);
        $comment->setAuthor($_POST['author']);
        $comment->setContent($_POST['content']);
        $this->getContainer()->getCommentService()->createComment($comment);

        // Redirect
        header('Location: index.php?controller=post&action=show&postId='.$postId);
    }
}
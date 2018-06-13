<?php
namespace OpenClassrooms\Blog\Controller;

require_once('BaseController.php');

/**
 * Comment back controller
 */
class CommentBackController extends BaseController
{
    public function listAction()
    {
        // Init view data
        $viewData = $this->initViewData();

        $viewData['commentsList'] = $this->getContainer()->getCommentManager()->getCommentsListToModerate();

        // Handle alerts
        foreach (['Success', 'Danger'] as $alertType) {
            $alertName = 'alert'.$alertType;
            if (!empty($_SESSION[$alertName])) {
                $viewData[$alertName] = $_SESSION[$alertName];
                $_SESSION[$alertName] = '';
            }
        }

        // Display view
        require('view/back/commentListView.php');
    }

    public function deleteAction()
    {
        // Get comment id
        $commentId = isset($_REQUEST['commentId']) ? (int) $_REQUEST['commentId'] : 0;
        if ($commentId <= 0) {
            throw new \Exception('Invalid commentId id');
        }

        // Delete comment
        $result = $this->getContainer()->getCommentManager()->deleteComment($commentId);
        // Is comment deleted successfully?
        if (!$result) {
            $_SESSION['alertDanger'] = 'Problème lors de la suppression du commentaire';
        } else {
            $_SESSION['alertSuccess'] = 'Commentaire supprimé avec succès';
        }

        // Redirect
        header('Location: admin.php?controller=comment&action=list');
    }
}
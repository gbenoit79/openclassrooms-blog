<?php
namespace OpenClassrooms\Blog\Controller;

require_once('BaseController.php');

/**
 * User front controller
 */
class UserFrontController extends BaseController
{
    public function loginAction()
    {
        // Init view data
        $viewData = $this->initViewData();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check post data
            if (empty($_POST['username'])) {
                $viewData['alertDanger'] = 'Pseudo vide';
            } else if (empty($_POST['password'])) {
                $viewData['alertDanger'] = 'Mot de passe vide';
            // Post data is OK
            } else {
                try {
                    $result = $this->getContainer()->getUserManager()->login($_POST['username'], $_POST['password']);
                } catch (\Exception $e) {
                    $result = false;
                }
                
                // Is logged successfully?
                if ($result) {
                    $_SESSION['alertSuccess'] = 'Connecté avec succès';
                    // Redirect
                    header('Location: admin.php');
                } else {
                    $viewData['alertDanger'] = 'Mauvais identifiant ou mot de passe';
                }
            }
        }
        
        // Display view
        require_once('view/front/userLoginView.php');
    }

    public function logoutAction()
    {
        $this->getContainer()->getUserManager()->logout();
        
        // Redirect
        header('Location: index.php');
    }
}
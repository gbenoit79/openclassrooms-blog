<?php
namespace OpenClassrooms\Blog\Model;

require_once('Manager.php');
require_once('User.php');

/**
 * User manager
 */
class UserManager extends Manager
{
    /**
     * Constructor
     * 
     * @param \PDO $databaseHandler
     * @return void
     */
    public function __construct(\PDO $databaseHandler)
    {
        $this->setDatabaseHandler($databaseHandler);
    }

    /**
     * Get connected user
     * 
     * @return array
     */
    public function getConnectedUser()
    {
        if (!empty($_SESSION['user'])) {
            return $_SESSION['user'];
        } else {
            return [];
        }
    }

    /** 
     * Get user by username
     * 
     * @param string $username
     * @return User
     */
    public function getUserByUsername($username)
    {
        if (empty($username)) {
            throw new \Exception('Empty username');
        }
        
        $request = $this->getDatabaseHandler()->prepare('SELECT u.id, u.username, u.password, u.email, DATE_FORMAT(u.creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr, u.user_group_id, ug.name AS user_group_name FROM users AS u LEFT JOIN user_groups AS ug ON u.user_group_id = ug.id WHERE username = ?');
        $request->execute(array($username));
        $result = $request->fetch();
        $request->closeCursor();
        if (!$result) {
            return false;
        }

        $user = new User();
        $user->setId($result['id']);
        $user->setUsername($result['username']);
        $user->setPassword($result['password']);
        $user->setEmail($result['email']);
        $user->setCreationDate($result['creation_date_fr']);
        $user->setUserGroupId($result['user_group_id']);
        $user->setUserGroupName($result['user_group_name']);

        return $user;
    }

    /**
     * Login
     * 
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login($username, $password)
    {
        if (empty($username)) {
            throw new \Exception('Empty username');
        } elseif (empty($password)) {
            throw new \Exception('Empty password');
        }
        
        // Get user
        $user = $this->getUserByUsername($username);
        if (!$user) {
            throw new \Exception('User not found');
        }
        
        // Check password
        $isPasswordCorrect = password_verify($password, $user->getPassword());
        if (!$isPasswordCorrect) {
            throw new \Exception('Password incorrect');
        }

        $_SESSION['user'] = [
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'groupId' => $user->getUserGroupId(),
        ];

        return true;
    }

    /**
     * Logout
     * 
     * @return bool
     */
    public function logout()
    {
        unset($_SESSION['user']);

        return true;
    }
}
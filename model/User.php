<?php
namespace OpenClassrooms\Blog\Model;

/**
 * User model
 */
class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $creationDate;
    private $userGroupId;
    private $userGroupName;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    public function getUserGroupId()
    {
        return $this->userGroupId;
    }
    public function setUserGroupId($userGroupId)
    {
        $this->userGroupId = $userGroupId;
    }

    public function getUserGroupName()
    {
        return $this->userGroupName;
    }
    public function setUserGroupName($userGroupName)
    {
        $this->userGroupName = $userGroupName;
    }
}
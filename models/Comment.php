<?php
/**
 * Comment model
 */
class Comment
{
    private $id;
    private $postId;
    private $author;
    private $content;
    private $creationDate;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPostId()
    {
        return $this->postId;
    }
    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }
}
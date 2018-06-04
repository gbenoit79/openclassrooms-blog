<?php
/**
 * Comment model
 */
class Comment
{
    private $id;
    private $articleId;
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

    public function getArticleId()
    {
        return $this->articleId;
    }
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;
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
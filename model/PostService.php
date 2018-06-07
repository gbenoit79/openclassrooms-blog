<?php
require_once(__DIR__.'/../model/Post.php');

/**
 * Post service
 */
class PostService
{
    private $databaseHandler;

    public function __construct(\PDO $databaseHandler)
    {
        $this->setDatabaseHandler($databaseHandler);
    }

    public function getDatabaseHandler()
    {
        return $this->databaseHandler;
    }
    public function setDatabaseHandler(\PDO $databaseHandler)
    {
        $this->databaseHandler = $databaseHandler;
    }

    public function getPostsList($total=5)
    {
        $request = $this->getDatabaseHandler()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, '.$total);
        $resultsList = $request->fetchAll();
        $request->closeCursor();

        $postsList = [];
        foreach ($resultsList as $result) {
            $post = new Post();
            $post->setId($result['id']);
            $post->setTitle($result['title']);
            $post->setContent($result['content']);
            $post->setCreationDate($result['creation_date_fr']);
            $postsList[] = $post;
        }

        return $postsList;
    }

    public function getPost($id)
    {
        $request = $this->getDatabaseHandler()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $request->execute(array($id));
        $result = $request->fetch();
        $request->closeCursor();

        $post = new Post();
        $post->setId($result['id']);
        $post->setTitle($result['title']);
        $post->setContent($result['content']);
        $post->setCreationDate($result['creation_date_fr']);

        return $post;
    }
}
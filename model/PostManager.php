<?php
namespace OpenClassrooms\Blog\Model;

require_once('Manager.php');
require_once('Post.php');

/**
 * Post manager
 */
class PostManager extends Manager
{
    public function __construct(\PDO $databaseHandler)
    {
        $this->setDatabaseHandler($databaseHandler);
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
        if ($id <= 0) {
            throw new \Exception('Invalid post id');
        }
        
        $request = $this->getDatabaseHandler()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $request->execute(array($id));
        $result = $request->fetch();
        $request->closeCursor();
        if (!$result) {
            return false;
        }

        $post = new Post();
        $post->setId($result['id']);
        $post->setTitle($result['title']);
        $post->setContent($result['content']);
        $post->setCreationDate($result['creation_date_fr']);

        return $post;
    }

    public function createPost(Post $post)
    {
        $request = $this->getDatabaseHandler()->prepare('INSERT INTO posts (title, content, creation_date) VALUES(?, ?, NOW())');
        
        return $request->execute(array($post->getTitle(), $post->getContent()));
    }

    public function updatePost(Post $post)
    {
        $request = $this->getDatabaseHandler()->prepare('UPDATE posts SET title = ?, content = ? WHERE id = ?');
        
        return $request->execute(array($post->getTitle(), $post->getContent(), $post->getId()));
    }
}
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

    /**
     * Get posts list
     * 
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getPostsList($offset=0, $limit=10)
    {
        $request = $this->getDatabaseHandler()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT :offset, :limit');
        $request->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $request->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $request->execute();
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
        
        $request = $this->getDatabaseHandler()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM posts WHERE id = ?');
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

    public function deletePost($id)
    {
        if ($id <= 0) {
            throw new \Exception('Invalid post id');
        }
        
        // Use a transaction to delete post and comments
        $result = true;
        try {
            $this->getDatabaseHandler()->beginTransaction();
            $this->getDatabaseHandler()->exec(sprintf('DELETE FROM posts WHERE id = %d', (int) $id));
            $this->getDatabaseHandler()->exec(sprintf('DELETE FROM comments WHERE post_id = %d', (int) $id));
            $this->getDatabaseHandler()->commit();
        } catch (Exception $e) {
            $this->getDatabaseHandler()->rollBack();
            throw $e;
        }
        
        return $result;
    }

    /**
     * Get total posts
     * 
     * @return int
     */
    public function getTotalPosts()
    {
        $result = $this->getDatabaseHandler()->query('SELECT COUNT(*) AS total FROM posts')->fetch();
        
        return (isset($result['total'])) ? (int) $result['total'] : 0;
    }
}
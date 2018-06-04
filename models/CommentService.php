<?php
require_once('Comment.php');

/**
 * Comment service
 */
class CommentService
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

    public function getCommentsList($articleId)
    {
        $request = $this->getDatabaseHandler()->prepare('SELECT id, article_id, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE article_id = ? ORDER BY creation_date');
        $request->execute(array($articleId));
        $resultsList = $request->fetchAll();
        $request->closeCursor();

        $commentsList = [];
        foreach ($resultsList as $result) {
            $comment = new Comment();
            $comment->setId($result['id']);
            $comment->setArticleId($result['article_id']);
            $comment->setAuthor($result['author']);
            $comment->setContent($result['content']);
            $comment->setCreationDate($result['creation_date_fr']);
            $commentsList[] = $comment;
        }

        return $commentsList;
    }

    public function createComment(Comment $comment)
    {
        $request = $this->getDatabaseHandler()->prepare('INSERT INTO comments (article_id, author, content, creation_date) VALUES(?, ?, ?, NOW())');
        
        return $request->execute(array($comment->getArticleId(), $comment->getAuthor(), $comment->getContent()));
    }
}
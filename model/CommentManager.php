<?php
namespace OpenClassrooms\Blog\Model;

require_once('Manager.php');
require_once('Comment.php');

/**
 * Comment manager
 */
class CommentManager extends Manager
{
    public function __construct(\PDO $databaseHandler)
    {
        $this->setDatabaseHandler($databaseHandler);
    }

    public function getCommentsList($postId)
    {
        $request = $this->getDatabaseHandler()->prepare('SELECT id, post_id, author, content, report_counter, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = ? ORDER BY creation_date');
        $request->execute(array($postId));
        $resultsList = $request->fetchAll();
        $request->closeCursor();

        $commentsList = [];
        foreach ($resultsList as $result) {
            $comment = new Comment();
            $comment->setId($result['id']);
            $comment->setPostId($result['post_id']);
            $comment->setAuthor($result['author']);
            $comment->setContent($result['content']);
            $comment->setReportCounter($result['report_counter']);
            $comment->setCreationDate($result['creation_date_fr']);
            $commentsList[] = $comment;
        }

        return $commentsList;
    }

    public function createComment(Comment $comment)
    {
        $request = $this->getDatabaseHandler()->prepare('INSERT INTO comments (post_id, author, content, creation_date) VALUES(?, ?, ?, NOW())');
        
        return $request->execute(array($comment->getPostId(), $comment->getAuthor(), $comment->getContent()));
    }

    /**
     * Report comment
     * 
     * @param int $commentId
     * @return bool
     */
    public function reportComment($commentId)
    {
        $request = $this->getDatabaseHandler()->prepare('UPDATE comments SET report_counter = report_counter + 1 WHERE id = ?');
        
        return $request->execute(array($commentId));
    }
}
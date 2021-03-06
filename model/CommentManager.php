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

    public function getCommentsList($postId, $offset=0, $limit=10)
    {
        $request = $this->getDatabaseHandler()->prepare('SELECT id, post_id, author, content, report_counter, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM comments WHERE post_id = :postId ORDER BY creation_date LIMIT :offset, :limit');
        $request->bindValue(':postId', $postId, \PDO::PARAM_INT);
        $request->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $request->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $request->execute();
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

    /**
     * Get comments list to moderate
     * 
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getCommentsListToModerate($offset=0, $limit=10)
    {
        $request = $this->getDatabaseHandler()->prepare('SELECT id, post_id, author, content, report_counter, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%i\') AS creation_date_fr FROM comments ORDER BY report_counter DESC LIMIT :offset, :limit');
        $request->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $request->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $request->execute();
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

    /**
     * Delete comment
     * 
     * @param int $commentId
     * @return bool
     */
    public function deleteComment($commentId)
    {
        $request = $this->getDatabaseHandler()->prepare('DELETE FROM comments WHERE id = :commentId');
        $request->bindValue(':commentId', $commentId, \PDO::PARAM_INT);

        return $request->execute();
    }

    /**
     * Get total comments
     * 
     * @param int $postId
     * @return int
     */
    public function getTotalComments($postId=0)
    {
        $sql = 'SELECT COUNT(*) AS total FROM comments';
        if ($postId > 0) {
            $sql .= ' WHERE post_id = '.(int)$postId;
        }
        $result = $this->getDatabaseHandler()->query($sql)->fetch();
        
        return (isset($result['total'])) ? (int) $result['total'] : 0;
    }
}
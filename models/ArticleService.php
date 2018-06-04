<?php
require('Article.php');

/**
 * Article service
 */
class ArticleService
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

    public function getArticlesList($total=5)
    {
        $request = $this->getDatabaseHandler()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles ORDER BY creation_date DESC LIMIT 0, '.$total);
        $resultsList = $request->fetchAll();
        $request->closeCursor();

        $articlesList = [];
        foreach ($resultsList as $result) {
            $article = new Article();
            $article->setId($result['id']);
            $article->setTitle($result['title']);
            $article->setContent($result['content']);
            $article->setCreationDate($result['creation_date_fr']);
            $articlesList[] = $article;
        }

        return $articlesList;
    }

    public function getArticle($id)
    {
        $request = $this->getDatabaseHandler()->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM articles WHERE id = ?');
        $request->execute(array($id));
        $result = $request->fetch();
        $request->closeCursor();

        $article = new Article();
        $article->setId($result['id']);
        $article->setTitle($result['title']);
        $article->setContent($result['content']);
        $article->setCreationDate($result['creation_date_fr']);

        return $article;
    }
}
<?php
/**
 * Container
 */
class Container
{
    protected $config;

    public function __construct(array $config)
    {
        $this->setConfig($config);
    }

    public function getConfig()
    {
        return $this->config;
    }
    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    protected function getDatabaseHandler()
    {
        static $instance;
        if (!isset($instance)) {
            $instance = new \PDO(
                $this->config['database']['dsn'],
                $this->config['database']['username'], 
                $this->config['database']['username']
            );
        }

        return $instance;
    }

    public function getPostManager()
    {
        static $instance;
        if (!isset($instance)) {
            include_once('PostManager.php');
            $instance = new PostManager($this->getDatabaseHandler());
        }

        return $instance;
    }

    public function getCommentManager()
    {
        static $instance;
        if (!isset($instance)) {
            include_once('CommentManager.php');
            $instance = new CommentManager($this->getDatabaseHandler());
        }

        return $instance;
    }
}
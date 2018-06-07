<?php
namespace OpenClassrooms\Blog\Model;

/**
 * Manager
 */
abstract class Manager
{
    protected $databaseHandler;

    public function getDatabaseHandler()
    {
        return $this->databaseHandler;
    }
    public function setDatabaseHandler(\PDO $databaseHandler)
    {
        $this->databaseHandler = $databaseHandler;
    }
}
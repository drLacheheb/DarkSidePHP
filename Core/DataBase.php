<?php

namespace Core;

use PDO;
use PDOStatement;

class DataBase
{
    private PDO $connection;
    private false|PDOStatement $statement;

    public function __construct($config)
    {

        $driver = $config['driver'];
        unset($config['driver']);

        if ($driver === 'sqlite') {
            $dsn = "{$driver}:". base_path("{$config['name']}.sqlite");
        } else {
            $dsn = "{$driver}:" . http_build_query($config, '', ';');
        }

        $this->connection = new PDO($dsn);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function query($query, $prams = [])
    {
        $this->statement = $this->connection->prepare($query);

        $this->statement->execute($prams);

        return $this;
    }

    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort();
        }
        return $result;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findAll(): false|array
    {
        return $this->statement->fetchAll();
    }

}

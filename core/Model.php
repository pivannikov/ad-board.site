<?php
namespace Core;

use http\Exception\InvalidArgumentException;
use PDO;
use PDOException;

class Model
{
    private static $db;

    public function __construct()
    {
        if (!self::$db) {
            try {
                self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            } catch (PDOException $exception) {
                throw new InvalidArgumentException($exception->getMessage());
            }
        }
    }

    protected function findOne($query, $params = [])
    {
        $stmt = self::$db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected function findMany($query)
    {
        $stmt = self::$db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function postsByPaginate($query)
    {
        $stmt = self::$db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}



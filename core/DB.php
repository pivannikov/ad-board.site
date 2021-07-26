<?php


namespace Core;


use PDO;

class DB
{
    private static $instance;  // экземпляр объекта

    /**
     *
     * @var PDO
     */
    private $pdo = false;

    /* Защищаем от создания через new DB */

    private function __construct() {

    }

    /* Защищаем от создания через клонирование */

    private function __clone() {

    }

    /* Защищаем от создания через unserialize */

    private function __wakeup() {

    }

    /**
     * Возвращает единственный экземпляр класса
     * @return DB
     */
    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Подключаемся к БД
     * @param type $dsn
     * @param type $dbuser
     * @param type $dbpassword
     * @param type $opt
     * @throws Exception
     */
    public function connect($dsn, $dbuser, $dbpassword, $opt) {
        try {
            $this->pdo = new PDO($dsn, $dbuser, $dbpassword, $opt);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Получить ссылку на PDO
     * @return boolean
     */
    public function get_pdo() {
        if ($this->pdo instanceof PDO) {
            return $this->pdo;
        }
        return false;
    }

    /**
     * Закрываем соединение с БД
     */
    public function close() {
        $this->pdo = null;
    }

}

/**
 * Параметры для подключения к БД
 */
$host = 'localhost';
$dbname = 'cars-blog';
$charset = 'utf8';

$dbuser = 'root';
$dbpassword = 'Minaev2019';

$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$dsn = "mysql:host = {$host}; dbname = {$dbname}; charset = {$charset}";

/**
 * *******************************
 */

/**
 * Попытка подключени к БД
 */
try {
    DB::getInstance()->connect($dsn, $dbuser, $dbpassword, $opt);
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
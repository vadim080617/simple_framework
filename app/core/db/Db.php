<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 29.01.19
 * Time: 13:18
 */

namespace app\core\db;


class Db
{
    protected $db;

    public static function Instance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new Db();
        }
        return $inst;
    }

    private function __construct()
    {
        $config = require 'app/db_config.php';
        $this->db = new \PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'], $config['user'], $config['password']);
    }

    public function query(string $queryStr) {
        $statement = $this->db->query($queryStr);
        if($statement) {
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $result;
    }
}
<?php

namespace app\core\model;
use app\core\db\Db;


class Model
{
    protected $tableName;
    protected $db;
    protected $primaryKey = 'id';

    public function __construct()
    {
        $this->db = Db::Instance();
    }

    public function all() {
        $result = $this->db->query('select * from `' . $this->tableName . '`');
        return $result;
    }
}
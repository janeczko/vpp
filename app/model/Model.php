<?php

namespace App\Model;

use Nette,
    Nette\Object,
    Nette\Database\Context;

abstract class Model extends Object
{
    const TABLE = '';

    /** @var Context */
    protected $db;

    /**
     * @param Context $database
     */
    public function __construct(Context $database)
    {
        $this->db = $database;
    }

    /**
     * @param $attr
     * @param $value
     * @param string $attrs
     * @return bool|Nette\Database\IRow|Nette\Database\Row
     */
    public function findBy($attr, $value, $attrs = '*')
    {
        return $this->db->query("SELECT {$attrs} FROM " . $this::TABLE . " WHERE {$attr}=?", $value)->fetch();
    }
}
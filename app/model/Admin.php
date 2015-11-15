<?php

namespace App\Model;

use Nette;

class Admin extends Model
{
    const TABLE = 'admin';

    /**
     * @param string $attr
     * @param string $value
     * @param string $attrs
     * @return bool|Nette\Database\IRow|Nette\Database\Row
     */
    public function findBy($attr, $value, $attrs = 'id, username, email, first_name, last_name, password')
    {
        return parent::findBy($attr, $value, $attrs);
    }

    /**
     * @param array $admin
     * @return bool|int|Nette\Database\Table\IRow
     */
    public function add(array $admin)
    {
        return $this->db->table($this::TABLE)->insert($admin);
    }

    public function findAll()
    {
        return $this->db->query('SELECT id, username, email, first_name, last_name FROM admin ORDER BY id')->fetchAll();
    }
}
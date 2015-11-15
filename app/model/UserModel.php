<?php

namespace App\Model;

use Nette;

class UserModel extends Model
{
    const TABLE = 'user';

    /**
     * @param string $attr
     * @param string $value
     * @param string $attrs
     * @return bool|Nette\Database\IRow|Nette\Database\Row
     */
    public function findBy($attr, $value, $attrs = 'id, username, email, first_name, last_name, password, role')
    {
        return parent::findBy($attr, $value, $attrs);
    }

    /**
     * @param array $user
     * @return bool|int|Nette\Database\Table\IRow
     */
    public function add(array $user)
    {
        return $this->db->table($this::TABLE)->insert($user);
    }

    public function findAll()
    {
        return $this->db->query('SELECT id, username, email, first_name, last_name, role FROM user ORDER BY id')->fetchAll();
    }
}
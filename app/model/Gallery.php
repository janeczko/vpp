<?php

namespace App\Model;

use Nette;

class Gallery extends Model
{
    /**
     * @return array|Nette\Database\IRow[]
     */
    public function getItems()
    {
        return $this->db->query('
            SELECT
              gi.id AS id,
              i.id AS image_id,
              i.dir AS dir,
              i.name AS `name`,
              CONCAT(i.dir, "/", i.name) AS path
            FROM gallery_items gi JOIN image i ON gi.image_id = i.id
            ORDER BY gi.id
        ')->fetchAll();
    }
}
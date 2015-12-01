<?php

namespace App\Model;

use Nette;

class Category extends Model
{
    const TABLE = 'category';

    /**
     * @param bool $subCategories
     * @return array|Nette\Database\IRow[]
     */
    public function findEshopCategories($subCategories = true)
    {
        $categories = $this->db->query('
            SELECT
              id, `name`, url
            FROM category
            WHERE eshop = 1 AND category_id IS NULL
        ')->fetchAll();

        if (!empty($categories) && $subCategories)
        {
            foreach ($categories as $category)
                $category->subCategories = $this->findByParentId($category->id);
        }

        return $categories;
    }

    /**
     * @param $id
     * @return array|Nette\Database\IRow[]
     */
    public function findByParentId($id)
    {
        return $this->db->query('
            SELECT
              id, `name`, url, category_id AS categoryId
            FROM category
            WHERE category_id = ?
        ', $id)->fetchAll();
    }

    /**
     * @param string $url
     * @return bool|Nette\Database\IRow|Nette\Database\Row
     * @throws NotFoundException
     */
    public function findByUrl($url)
    {
        $category = $this->db->query('
            SELECT
              id, `name`, url, category_id AS categoryId
            FROM category
            WHERE url = ?
        ', $url)->fetch();

        if (!$category)
            throw new NotFoundException('Kategorie nenalezena', 'category');

        return $category;
    }
}
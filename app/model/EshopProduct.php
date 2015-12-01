<?php

namespace App\Model;

use Nette;

class EshopProduct extends Model
{
    const TABLE = 'eshop_product';

    /**
     * @param int $categoryId
     * @param bool|true $images
     * @return array|Nette\Database\IRow[]
     */
    public function findByCategoryId($categoryId, $images = true)
    {
        $products = $this->db->query('
            SELECT
              id, `name`, `desc`, price, stock
            FROM eshop_product
            WHERE category_id = ?
        ', $categoryId)->fetchAll();

        if (!empty($products) && $images)
        {
            foreach ($products as $product)
                $product->images = $this->findProductImages($product->id);
        }

        return $products;
    }

    /**
     * @param int $productId
     * @return array|Nette\Database\IRow[]
     */
    public function findProductImages($productId)
    {
        return $this->db->query('
            SELECT
              i.id AS id,
              i.dir AS dir,
              i.name AS `name`,
              CONCAT(i.dir, "/", i.name) AS path
            FROM image_eshop_product iep JOIN image i ON iep.image_id = i.id
            WHERE iep.eshop_product_id = ?
        ', $productId)->fetchAll();
    }
}
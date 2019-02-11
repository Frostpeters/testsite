<?php

class product
{

    const SHOW_BY_DEFAULT = 10;

    public function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {

        $sql = 'SELECT `id`,`name`,`price`,`image`,`is_new` FROM products '
            . 'WHERE `status` = "1" '
            . 'LIMIT ' . $count;


        $query = db::connect()->query($sql);

        return $productList = $query->fetchAll();

    }

    public function getLatestProductsByCategory($categoryId = false)
    {

        $sql = "SELECT `id`,`name`,`price`,`image`,`is_new` FROM products "
            . "WHERE `status` = '1' AND category_id = '$categoryId'"
            . "LIMIT " . self::SHOW_BY_DEFAULT;


        $query = db::connect()->query($sql);

        return $product = $query->fetchAll();

    }
}
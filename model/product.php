<?php

class product
{

    const SHOW_BY_DEFAULT = 10;

    public function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {

        //тут би ще б краще перевіряти що $count integer, бо зазвичай ліміти в проектах вибираються користувачем 5,10,!5
        if (!is_numeric($count)) $count = self::SHOW_BY_DEFAULT;
        
        $sql = 'SELECT `id`,`name`,`price`,`image`,`is_new` FROM products 
            WHERE `status` = 1 LIMIT ' . $count;


        $query = db::connect()->query($sql);

        return $query->fetchAll();

    }

    public function getLatestProductsByCategory($categoryId = 0)
    {

        //За замовчуванням ти поставив false, якщо параметр не буде передаватися в метод
        //то получиться LIMIT false а це буде фатал ерор
     
        
        $sql = "SELECT `id`,`name`,`price`,`image`,`is_new` FROM products WHERE `status` = '1' AND category_id = ?
            LIMIT " . self::SHOW_BY_DEFAULT;


        $query = db::connect()->prepare($sql);

        $query->execute([$categoryId]);
        
        return $query->fetchAll();

    }
}

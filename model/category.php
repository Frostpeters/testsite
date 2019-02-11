<?php

class category
{

    public function getCategory()
    {

        $sql = "SELECT `id`,`name` FROM category";

        $query = db::connect()->query($sql);

        return $categoryList = $query->fetchAll();


    }

}
<?php

require_once ROOT . '/model/category.php';
require_once ROOT . '/model/product.php';

class siteController
{
    public function actionIndex()
    {

        $categories = category::getCategory();
        $latestProduct = product::getLatestProducts(6);
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionCategory($categoryId)
    {

        $categories = category::getCategory();
        $latestProduct = product::getLatestProductsByCategory($categoryId);
        require_once(ROOT . '/views/site/index.php');
        return true;
    }

}
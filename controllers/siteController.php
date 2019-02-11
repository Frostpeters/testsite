<?php

require_once ROOT . '/model/category.php';
require_once ROOT . '/model/product.php';

class siteController
{
    public function actionIndex()
    {
        $categories = (new category())->getCategory();
        $latestProduct = (new product())->getLatestProducts(6);
        require_once ROOT . '/views/site/index.php';
        return true;
    }

    public function actionCategory($categoryId)
    {

        $categories = (new category())->getCategory();
        $latestProduct = (new product())->getLatestProductsByCategory($categoryId);
        require_once ROOT . '/views/site/index.php';
        return true;
    }

}

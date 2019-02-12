<?php
require_once ROOT.'/model/cart.php';
require_once ROOT.'/model/category.php';
require_once ROOT.'/model/product.php';

class cartController{

    public function actionAddAjax($id){

        echo (new cart())->addProduct($id);
        return true;

    }
    public function actionIndex()
    {
        $categories = array();
        $categories = (new category())->getCategory();

        $productsInCart = false;

        $productsInCart = cart::getProducts();


        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = (new product())->getProdustsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = cart::getTotalPrice($products);
        }

        require_once(ROOT . '/views/cart/index.php');

        return true;
    }

    public function actionDelete($id)
    {

        // Удаляем заданный товар из корзины
        cart::deleteProduct($id);
        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

    public function actionAddone($id)
    {

        // Удаляем заданный товар из корзины
        cart::addoneProduct($id);
        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

    public function actionDelone($id)
    {

        // Удаляем заданный товар из корзины
        cart::deloneProduct($id);
        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }


}
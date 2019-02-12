<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


class cart
{

    public function addProduct($id)
    {

        $id = intval($id);
        $productInCart = array();

        if (isset($_SESSION['product'])) {
            $productInCart = $_SESSION['product'];
        }

        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id]++;
        } else {
            $productInCart[$id] = 1;
        }

        $_SESSION['product'] = $productInCart;
        return self::countItems();

    }

    public static function countItems()
    {
        if (isset($_SESSION['product'])) {
            $count = 0;
            foreach ($_SESSION['product'] as $id => $quantity) {
                $count += $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts()
    {
        if (isset($_SESSION['product'])) {
            return $_SESSION['product'];
        }
        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function deleteProduct($id)
    {
        $productsInCart = self::getProducts();
        unset($productsInCart[$id]);
        $_SESSION['product'] = $productsInCart;
    }

    public static function addoneProduct($id)
    {
        $id = intval($id);

        $productInCart = self::getProducts();


        if (isset($_SESSION['product'])) {
            $productInCart = $_SESSION['product'];
        }

        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id]++;
        } else {
            $productInCart[$id] = 1;
        }

        $_SESSION['product'] = $productInCart;
    }

    public static function deloneProduct($id)
    {
        $id = intval($id);

        $productInCart = self::getProducts();


        if (isset($_SESSION['product'])) {
            $productInCart = $_SESSION['product'];
        }

        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id]--;
        }

        $_SESSION['product'] = $productInCart;
    }

}
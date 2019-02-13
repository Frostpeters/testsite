<?php

class cart
{
    
    public function addProduct($id)
    {
        if (!is_numeric($id)) $id= 1;

        $productInCart = array();

        if (array_key_exists($id, $productInCart)) {
            $_SESSION['product'][$id]++;
        } else {
            $_SESSION['product'][$id] = 1;
        }
        
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
        //так кортоше
        return $_SESSION['product'] ?? false;
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

    
    //чим відрізняється від addProduct($id)? аналогічно з addOneProdcut
    
    public static function addOneProduct($id)
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
    //аналогічно з intval, тобі тут треба ціле чило, а якщо передати обєкт буде гайки

    public static function deleteOneProduct($id)
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

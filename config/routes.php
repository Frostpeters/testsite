<?php


return array(
    'product/([0-9]+)' => 'product/view/$1',
    'category/([0-9]+)' => 'site/category/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/addone/([0-9]+)' => 'cart/addone/$1',
    'cart/delone/([0-9]+)' => 'cart/delone/$1',
    'cart' => 'cart/index',
    '' => 'site/index',

);
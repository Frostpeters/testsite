<?php


return array(
    'product/([0-9]+)' => 'product/view/$1',
    'category/([0-9]+)' => 'site/category/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',
    '' => 'site/index',

);
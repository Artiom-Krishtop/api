<?php
use collection\Collection as Collection;
use collection\Product as Product;


define('ROOT', dirname(__FILE__));
define('URIAPI','http://1162trainee.dev-bitrix.by/api/' );

require_once ( ROOT . '/components/autoloader.php');

$newOrder = [
  'id' => 33,
  'title' => 'Заказ №1',
  'status' => 'new',
  'id' => [
    'id' => 2,
    'name' => 'Телефон нокиа 3310',
    'stock' => 0,
    'price' => 2000.00,
  ]
];

$API_products = 'products';
$API_order = 'orders';


$products = new Collection(URIAPI, $API_order);


print_r($products->addItem($newOrder));

// $a = new Product;
//
// $id = 32;
// var_dump($a->getProductsBiId($id));

<?php
use Collection\Collection as Collection;
use Collection\Product as Product;


define('ROOT', dirname(__FILE__));
define('URIAPI','http://1162trainee.dev-bitrix.by/api/' );

require_once ( ROOT . '/Components/Autoloader.php');

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

$API_products = 'product';
$API_order = 'orders';


$products = new Collection($API_products);

$products->getCollection();

// $product = $products->getItem('id', '2');
// var_dump($product);
//
// echo "<br>";
//
// $product->offsetSet('name', 'hello world');
//
// var_dump($product);

// print_r($products->getList());

// $a = new Product(['id' => '1', 'name' => 'example', 'stock' => '4', 'price' => '1234']);
//
// var_dump($a->getId());

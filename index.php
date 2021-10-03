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

$API_products = 'product';
$API_order = 'orders';


$products = new Collection(URIAPI, $API_products);

// $products->getCollection();
print_r($prod = $products->getItemById(2));
$prod->create('name', 'samsung');
$prod->create('stock', '53');

echo "<br>";
print_r($products->getList());

// $a = new Product(['id' => '1', 'name' => 'example', 'stock' => '4', 'price' => '1234']);
//
// var_dump($a->getId());

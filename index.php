<?php

use Collection\Collection;
use Collection\Entity\{Product, Order};


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

$order = new Collection(Order::class);

$order->getList();

$id_order = $order->offsetGet('1');

var_dump($id_order);
echo '<br>';

$products = new Collection(Product::class);

$products->getList();

$id_product = $products->offsetGet('2');

$id_product = $id_product->getById('2');

var_dump($id_product);

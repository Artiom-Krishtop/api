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

$products = new Collection(Order::class);

$products->getList();

$id_2 = $products->offsetGet('1');

$id = $id_2->create();

var_dump($id);

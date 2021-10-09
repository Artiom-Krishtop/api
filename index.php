<?php

use Components\Collection;
use Entity\{Product, Order};


define('ROOT', dirname(__FILE__));
define('URIAPI','http://1162trainee.dev-bitrix.by/api/' );

require_once ( ROOT . '/Components/Autoloader.php');

$newOrder = [
    'id' => 347382417,
    'name' => 'Автомобиль БМВ 3310',
    'quantity' => 0,
    'price' => 2000.00,
];

$newOrder2 = [
    'id' =>73246,
    'name' => 'Шаурма XXL',
    'quantity' => 34,
    'price' => 4500.00,
];

$API_products = 'product';
$API_order = 'orders';

$order = new Collection(Order::class);

$order->getList();

$id_order = $order->offsetGet('1');

$id_order->setStatus('prodano');

$id_order->removeCollection(0);

$CartOrder = $id_order->addCollection(new Collection(Product::class));

$CartOrder->offsetSet(new Product($newOrder));
$CartOrder->offsetSet(new Product($newOrder2));


// $order->saveCollection();
var_dump($order->saveCollection());

<?php
use models\products\Products as Products;
use models\order\Order as Order;


define('ROOT', dirname(__FILE__));

require_once ( ROOT . '/components/autoloader.php');

$arr = [
  'id' => 33,
  'title' => 'Заказ №1',
  'status' => 'new',
];

$a = new Order('http://1162trainee.dev-bitrix.by/api/order/answer.json');
$a->createOrder($arr);

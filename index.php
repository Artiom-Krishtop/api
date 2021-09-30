<?php


define('ROOT', dirname(__FILE__));

require_once ( ROOT . '/components/autoloader.php');

$arr = [
  'id' => 33,
  'title' => 'Заказ №1',
  'status' => 'new',
];

$a = new models\products\Products;
$a->getProduct(2);

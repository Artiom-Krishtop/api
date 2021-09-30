<?php
// namespace api;


define('ROOT', dirname(__FILE__));

require_once ( ROOT . '/components/autoloader.php');

// 'http://127.0.0.1/api/order/13/answer.json
// 'http://127.0.0.1/api/order/answer.json
// 'http://127.0.0.1/api/order/add/answer.json

       // $ch = curl_init('http://1162trainee.dev-bitrix.by/api/order/answer.json');
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       // curl_setopt($ch, CURLOPT_HEADER, false);
       // $html = curl_exec($ch);
       // curl_close($ch);
       //
       // echo $html;

// $router = new Router();
// $router->run();
$a = new Request('http://1162trainee.dev-bitrix.by/api/order/answer.json');
$a->methodGET();

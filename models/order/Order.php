<?php
namespace models\order;

use components\Request as Request;

// класс для работы с заказами

class Order
{
  private $url;
  private $request;

  function __construct($url)
  {
    $this->request = new Request();
    $this->url = $url;
  }

  // получить список заказов

  public function getListOrder()
  {
    // вставляем URL запроса
    $this->request->setURL($this->url);
    $responseData = $this->request->GET();
    return $responseData;
  }

  // получить заказ по ID

  public function getOrder($id)
  {
    // формируем URL для запроса
    $url = $this->url . '?id=' . $id;

    // устанавливаем URL в запрос
    $this->request->setURL($url);

    // получаем ответ в переменную
    $responseData = $this->request->GET();

    return $responseData;
  }

  // создать заказ

  public function createOrder($requestData)
  {
    // устанавливаем данные в запрос
    $this->request->setURL($this->url);

    $requestData = json_encode($requestData, JSON_UNESCAPED_UNICODE);
    $this->request->setData($requestData);

    $header = ['Content-Type:application/json'];
    $this->request->setHeader($header);

    // получаем ответ в переменную
    $responseData = $this->request->POST();

    return $responseData;
  }
}

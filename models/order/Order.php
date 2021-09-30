<?php
namespace models\order;

use components\Request as Request;

// класс для работы с заказами

class Order
{
  private $url;
  private $data;

  function __construct($url)
  {
    $this->data = new Request();
    $this->url = $url;
  }

  // получить список заказов

  public function getListOrder()
  {
    // вставляем URL запроса
    $this->data->setURL($this->url);
    $responseData = $this->data->GET();
    return $responseData;
  }

  // получить заказ по ID

  public function getOrder($id)
  {
    // формируем URL для запроса
    $url = $this->url . '?id=' . $id;

    // устанавливаем URL в запрос
    $this->data->setURL($url);

    // получаем ответ в переменную
    $responseData = $this->data->GET();

    return $responseData;
  }

  // создать заказ

  public function createOrder($requestData)
  {
    // устанавливаем данные в запрос
    $this->data->setURL($this->url);

    $requestData = json_encode($requestData, JSON_UNESCAPED_UNICODE);
    $this->data->setData($requestData);

    $header = ['Content-Type:application/json'];
    $this->data->setHeader($header);

    // получаем ответ в переменную
    $responseData = $this->data->POST();

    return $responseData;
  }
}

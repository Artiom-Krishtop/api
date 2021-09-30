<?php
namespace models\products;
use components\Request as Request;

// класс для работы с продуктами

class Products
{
  private $url;
  private $request;

  function __construct($url)
  {
    $this->request = new Request();
    $this->url = $url;
  }

  // получить список продуктов

  public function getListProducts()
  {
    $this->request->setURL($this->url);

    // получаем ответ в переменную
    $responseData = $this->request->GET();

    return $responseData;
  }

  // получить продукт по ID

  public function getProduct($id)
  {
    // формируем URL для запроса
    $url = $this->url . '?id=' . $id;

    // устанавливаем URL в запрос
    $this->request->setURL($url);

    // получаем ответ в переменную
    $responseData = $this->request->GET();

    return $responseData;
  }

}

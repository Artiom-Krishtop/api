<?php
namespace models\products;
use components\Request as Request;

// класс для работы с продуктами

class Products
{
  private $url;
  private $data;

  function __construct($url)
  {
    $this->data = new Request();
    $this->url = $url;
  }

  // получить список продуктов

  public function getListProducts()
  {
    $this->data->setURL($this->url);

    // получаем ответ в переменную
    $responseData = $this->data->GET();

    return $responseData;
  }

  // получить продукт по ID

  public function getProduct($id)
  {
    // формируем URL для запроса
    $url = $this->url . '?id=' . $id;

    // устанавливаем URL в запрос
    $this->data->setURL($url);
    
    // получаем ответ в переменную
    $responseData = $this->data->GET();

    return $responseData;
  }

}

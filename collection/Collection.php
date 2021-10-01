<?php
namespace collection;
use components\Request as Request;

/**
 *
 */
class Collection
{
  private $arrayObj = [];
  private $url;
  private $request;
  private $entity;

  function __construct($uri,$entity)
  {
    $this->url = $uri . $entity . '/' . $entity . '.json';
    $this->entity = $entity;
    $this->request = new Request();
  }

  public function getItem()
  {
    $response = json_decode($this->request->GET($this->url));

    foreach ($response as $entity) {
      $this->arrayObj[] = $entity;
    }

    return $this->arrayObj;
  }

  public function addItem($requestData)
  {
    $requestData = json_encode($requestData, JSON_UNESCAPED_UNICODE);

    $headers = ['Content-Type:application/json'];

    // получаем ответ в переменную
    $this->request->POST($this->url, $headers, $requestData);
  }
}

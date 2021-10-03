<?php
namespace collection;
use components\Request as Request;
use collection\Product as Product;

// класс для работы с коллекцией объектов

class Collection
{
  private $arrayObj = [];
  private $uri;
  private $request;
  private $entity;

  function __construct($url,$entity)
  {
    $this->uri = $url . $entity . '/' . $entity . '.json';
    $this->entity = 'collection\\' . ucfirst($entity);
    $this->request = new Request();
    $this->getCollection();
  }

  // Добавление объектов в коллекцию из API

  protected function getCollection()
  {
    // $response = json_decode($this->request->GET($this->uri));
    $json = '[{"id":"3","name":"Телефон нокиа 2222","stock":4,"price":2500},
              {"id":"2","name":"Телефон нокиа 3310","stock":0,"price":2000}]';
    $response = json_decode($json, true);
    foreach ($response as $field) {

      $this->arrayObj[] = new $this->entity($field);
    }
    return $this->arrayObj;
  }

  // Обновление данных в API

  public function saveCollection()
  {
    $JSONdata = json_encode($this->arrayObj);

    $headers = 'Content-Type:application/json';

    $this->request->POST($this->uri,$headers,$JSONdata);
  }

  // Добавление нового элемента в коллекцию

  public function addItemInCollection(array $field)
  {
    $this->arrayObj[] = new $this->entity($field);

    return $this->arrayObj;
  }

  // Получить список объектво коллекции

  public function getList()
  {
    return $this->arrayObj;
  }

  // Получить объект по ID

  public function getItemById($id)
  {
    foreach ($this->arrayObj as $obj) {
      if ($obj->getId() == $id) {
        return $obj;
      }
    }
  }
}

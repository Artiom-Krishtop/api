<?php
namespace Collection;
use Components\Request as Request;
use Entity\Product as Product;
use Config\Get as Get;

// класс для работы с коллекцией объектов

class Collection
{
  private $container = [];
  private $request;
  private $entity;

  function __construct($entity)
  {
    $this->entity = 'Entity\\' . ucfirst($entity);
  }

  // Добавление объектов в коллекцию из API

  public function getCollection()
  {
    $request = new Request(new Get(),'product');
    $response = $request->request();
    // $response = $this->request->request('get');
    // $response = json_decode($response);

    foreach ($response as $field) {

      $this->container[] = new $this->entity($field);
    }
    var_dump($this->container);
  }

  // Обновление данных в API

  public function saveCollection()
  {
    $JSONdata = json_encode($this->container);

    $headers = 'Content-Type:application/json';

    $this->request->POST($this->uri,$headers,$JSONdata);
  }

  // Добавление нового элемента в коллекцию

  public function addItemInCollection($field)
  {
    $this->container[] = new $this->entity($field);

    return $this->container;
  }

  // Получить список объектов коллекции

  public function getList()
  {
    if (empty($this->container)) {
      $this->getCollection();
    }
    return $this->container;
  }

  // Получить объект по ключу

  public function getItem($key, $value)
  {
    foreach ($this->container as $obj)
    {
      if ($obj->offsetGet($key) == $value)
      {
        return $obj;
      }
    }
  }
}

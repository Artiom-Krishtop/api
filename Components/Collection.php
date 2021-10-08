<?php

namespace Components;

use Request\Request;
use Request\Config\Uri;
use Request\Method\Get;
use Collection\Entity\AbstractEntity;

// класс для работы с коллекцией объектов

class Collection
{
  private $container = [];
  private $entity;

  function __construct($entity)
  {
    $this->entity = $entity;
  }

  // Добавление объектов в коллекцию из API

  protected function getCollection()
  {
    $request = new Request(
      new Get,
      new Uri($this->entity::ENTITY_CODE)
    );

    $response = json_decode($request->request(), true);

    foreach ($response as $field) {

      $this->offsetSet(new $this->entity($field));
    }
    // var_dump($this->container);
  }

  // Получить список объектов коллекции

  public function getList()
  {
    if (empty($this->container)) {
      $this->getCollection();
    }

    return $this->container;
  }

  // Вставить объект в коллекцию

  public function offsetSet(object $value)
  {
    if ($this->offsetExists($value->getId())) {
      echo 'Объект с таким ID уже существует!';
    } else {
      $this->container[] = $value;
    }
  }

  // Получить объект коллекции

  public function offsetGet($id)
  {
    foreach ($this->container as $obj) {
      if ($obj->getId() == $id) {
        return $obj;
      }
    }
  }

  // Существует ли объект в коллекции

  public function offsetExists($id)
  {
    foreach ($this->container as $obj) {
      if ($obj->getId() == $id) {
        return true;
      }
    }

    return false;
  }

  // Метод для создания запроса к  API

  protected function editRequest(IMethod $method, Uri $uri, $data = null)
  {
    return new Request($method, $uri, $data);
  }

  // Сохранить коллекцию

  public function saveCollection()
  {
    $request = $this->editRequest(
      new Put(),
      new Uri(static::ENTITY_CODE),
      $this->container
    );

    $response = $request->request();

    return $response;
  }
}

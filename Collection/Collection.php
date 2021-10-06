<?php

namespace Collection;

use Config\Uri;
use Request\Request;
use Request\Method\Get;
use Collection\Entity\IEntity;

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

  public function getCollection()
  {
    $request = new Request(
      new Get,
      new Uri($this->entity::ENTITY_CODE)
    );

    $response = json_decode($request->request());

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

  public function offsetSet(IEntity $value)
  {
    $this->container[] = $value;
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
}

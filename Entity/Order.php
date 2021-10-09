<?php

namespace Entity;

use Entity\Product;
use Request\Request;
use Request\Config\Uri;
use Components\Collection;
use Request\Method\{IMethod, Get, Post, Put};

class Order extends AbstractEntity
{
  const ENTITY_CODE = 'order';

  public function getFields()
  {
    $arrayFields = [];

    $arrayFields['id'] = $this->id;

    foreach ($this->container as $key => $value) {
      $arrayFields[$key] = $value;
    }

    $arrayFields['products'] = $this->container['products']->getFieldsObj();

    return $arrayFields;
  }

  // Коллекция для работы с товарами заказа

  public function addCollection(Collection $product )
  {
    $this->container['products'] = $product;

    return $this->container['products'];
  }

  // Удалить коллекцию с товарами из заказа

  public function removeCollection($key)
  {
    unset($this->container['products'][$key]);
  }
}

<?php

namespace Collection\Entity;

use Request\Request;
use Request\Config\Uri;
use Request\Method\{IMethod, Get, Post, Put};

class Order extends AbstractEntity
{
  const ENTITY_CODE = 'order';

  public function addProduct(array $product)
  {
    $this->container['products'] = $product;
  }

  public function removeProduct($key)
  {
    uset($this->container['products'][$key]);
  }
}

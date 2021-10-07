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

  public function addProduct(Collection $product )
  {
    $this->container['products'] = $product;

    return $this->container['products'];
  }

  public function removeProduct($key)
  {
    unset($this->container['products'][$key]);
  }
}

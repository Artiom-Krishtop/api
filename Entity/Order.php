<?php
namespace Entity;

/**
 *
 */
class Order implements Entity
{
  private $container = [];

  function __construct($fields)
  {
    foreach ($fields as $key => $value) {
      $this->container[$key] = $value;
    };
  }

  public function offsetSet($key, $value)
  {
    $this->container[$key] = $value;
  }

  public function offsetGet($key)
  {
    return $this->container[$key];
  }

  public function offsetExists($key)
  {
    if (array_key_exists($key, $this->container)) {
      return true;
    }else {
      return false;
    }
  }

  public function addProduct($product)
  {
    $this->container['products'] = $product;
  }

  public function removeProduct($key)
  {
    uset($this->container['products'][$key]);
  }

}

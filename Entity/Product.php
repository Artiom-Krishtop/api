<?php
namespace Entity;



Class Product implements Entity
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
}

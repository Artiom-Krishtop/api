<?php

namespace Collection\Entity;

use Config\Uri;
use Request\Request;
use Request\Method\{IMethod, Get, Post, Put};

class Order implements IEntity
{
  const ENTITY_CODE = "order";

  private $container = [];

  function __construct($fields)
  {
    foreach ($fields as $key => $value) {
      $this->edit($key, $value);
    }
  }

  public function getId()
  {
    return $this->container['id'];
  }

  public function getById()
  {
    $request = $this->editRequest(
      new Get(),
      new Uri(static::ENTITY_CODE,$this->getId())
    );

    $response = $request->request();

    return $response;
  }

  public function edit($key, $value)
  {
    $this->container[$key] = $value;
  }

  public function create()
  {
    $request = $this->editRequest(
      new Post(),
      new Uri(static::ENTITY_CODE),
      $this->container
    );

    $response = $request->request();

    return $response;
  }

  public function save()
  {
    $request = $this->editRequest(
      new Put(),
      new Uri(static::ENTITY_CODE),
      $this->container
    );

    $response = $request->request();

    var_dump($response);
    return $response;
  }

  protected function editRequest(IMethod $method, Uri $uri, $data = null)
  {
    return new Request($method, $uri, $data);
  }

  public function addProduct(array $product)
  {
    $this->container['products'] = $product;
  }

  public function removeProduct($key)
  {
    uset($this->container['products'][$key]);
  }

}

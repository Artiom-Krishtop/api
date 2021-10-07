<?php

namespace Entity;

use Request\Request;
use Request\Config\Uri;
use Request\Method\{IMethod, Get, Post, Put};

abstract class AbstractEntity
{
  const ENTITY_CODE = '';

  protected $id;
  protected $container = [];

  function __construct($fields)
  {
    $this->id = $fields['id'];

    unset($fields['id']);

    foreach ($fields as $key => $value) {
      $this->edit($key, $value);
    }
  }

  public function __call($name, $value)
  {
    $fieldName = strtolower(substr($name, 3));

    $this->container[$fieldName] = implode('', $value);
  }

  public function getId()
  {
    return $this->id;
  }


  public function getById($id)
  {
    $request = $this->editRequest(
      new Get(),
      new Uri(static::ENTITY_CODE,$id)
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

    return $response;
  }

  protected function editRequest(IMethod $method, Uri $uri, $data = null)
  {
    return new Request($method, $uri, $data);
  }

  public function getFields()
  {
    return $this->container;
  }
}

<?php
namespace Config;

/**
 *
 */
class Uri
{
  protected $entity;

  function __construct($entity)
  {
    $this->entity = $entity;
  }

  public function setUri($method, $data)
  {
    $uri = URIAPI . $this->entity . '/' . $this->entity . '.json';

    $method = ucfirst(strtolower($method));

    if ($method == 'Get') {
      if (is_null($this->data) {
        return $uri;
      }else {
        $uri = $uri . '?';
        foreach ($data as $key => $value) {
          $uri .= '&' . $key . '=' . $value;
        }
        return $uri;
      }
    }
    return $uri;
  }
}

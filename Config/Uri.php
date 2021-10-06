<?php
namespace Config;

/**
 *
 */
class Uri
{
  protected $uri;

  function __construct($entity, $id = null)
  {
    if (is_null($id)) {
      $id = '';
    }else {
      $id .= '/';
    }
    $this->uri = URIAPI . $entity . '/'. $id . $entity . '.json';
  }

  public function setUri($method, $data = null)
  {
    $method = strtoupper($method);
    if ($method == 'GET') {
      if (!is_null($data)) {

        $query = http_build_query($data);

        $this->uri .= '?' . $query;
      }
    }
    return $this->uri;
  }
}

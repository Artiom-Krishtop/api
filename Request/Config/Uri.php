<?php
namespace Request\Config;

/**
 *
 */
class Uri
{
  protected $uri;

  function __construct($urn, $id = null)
  {
    if (is_null($id)) {
      $id = '';
    }else {
      $id .= '/';
    }
    $this->uri = URIAPI . $urn . '/'. $id . $urn . '.json';
    echo $this->uri . '<br>';
  }

  public function getUri()
  {
    return $this->uri;
  }
}

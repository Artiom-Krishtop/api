<?php
namespace Config;


/**
 *
 */
class Headers
{
  private $headers = [
    'Content-Type: application/json',
  ];

  public function setHeaders()
  {
    return $this->headers;
  }
}

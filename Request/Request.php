<?php

namespace Request;

use Request\Method\IMethod;
use Request\Config\Uri;

// класс для HTTP запросов

class Request
{
  protected $uri;
  protected $method;
  protected $data;

  function __construct(IMethod $method, Uri $uri, $data = null)
  {
    $this->method = $method;
    $this->data = $data;

    $this->uri = $uri;
  }

  public function request()
  {
    $curl = curl_init();

    $this->method->set_options($curl, $this->uri, $this->data);

    $response = curl_exec($curl);

    $error = curl_error($curl);

    if (!empty($error)) {
      echo $error;
    }

    curl_close($curl);

    return $response;
  }
}

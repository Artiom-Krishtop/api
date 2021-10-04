<?php
namespace components;
use Config\Method as Method;
use Config\Uri as Uri;

// класс для HTTP запросов

class Request
{
  protected $uri;
  protected $method;

  function __construct(Method $method, $entity)
  {
    $this->uri = new Uri($entity);
    $this->method = $method;
  }

  public function request($data = null)
  {
    $curl = curl_init();

    $method->set_options($curl);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    if (!empty($error)) {
      echo $error;
    }

    curl_close($curl);

    return $response;
  }
}

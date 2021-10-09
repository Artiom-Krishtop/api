<?php

namespace Request\Method;

use Request\Config\{Uri, Headers};

class Put implements IMethod
{
  private const METHOD_TYPE = 'PUT';

  function __toString()
  {
    return self::METHOD_TYPE;
  }

  public function set_options(&$curl,Uri $uri, $data = null)
  {

    curl_setopt_array($curl, [
      CURLOPT_URL => $uri->getUri(),
      CURLOPT_CUSTOMREQUEST => self::METHOD_TYPE,
      CURLOPT_HTTPHEADER => $this->setHeaders(),
      CURLOPT_POSTFIELDS => $this->setData($data),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_XOAUTH2_BEARER => 'tocken'
    ]);
  }

  protected function setHeaders()
  {
    $header = new Headers();
    $headers = $header->setHeaders();
    return $headers;
  }

  protected function setData($data)
  {
    $json_data = json_encode($data, JSON_UNESCAPED_UNICODE);
    
    return $json_data;
  }
}

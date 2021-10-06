<?php

namespace Request\Method;

use Config\{Uri, Headers};

class Get implements IMethod
{
  private const METHOD_TYPE = 'GET';

  function __toString()
  {
    return self::METHOD_TYPE;
  }

  public function set_options(&$curl,Uri $uri, $data = null)
  {
    curl_setopt_array($curl, [
      CURLOPT_URL => $this->setUri($uri, $data),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_XOAUTH2_BEARER => 'tocken',
    ]);
  }

  protected function setUri(Uri $uri, $data)
  {
    $uri = $uri->setUri(self::METHOD_TYPE, $data);
    return $uri;
  }
}

<?php

namespace Request\Method;

use Request\Config\Uri;

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
      CURLOPT_URL => $uri->getUri(),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_XOAUTH2_BEARER => 'tocken',
    ]);
  }
}

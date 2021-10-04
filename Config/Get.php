<?php
namespace Config;
use Config\Method as Method;



/**
 *
 */
class Get implements Method
{
  private const METHOD_TYPE = 'GET';

  public function set_options(&$curl)
  {
    curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_XOAUTH2_BEARER => 'tocken',
    ]);
  }
}

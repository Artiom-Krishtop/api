<?php
namespace Config;
use Config\Method as Method;
/**
 *
 */
class Post implements Method
{
  const private METHOD_TYPE = 'POST';

  public function set_options(&$curl)
  {
    curl_setopt_array($curl, [
      CURLOPT_HTTPHEADER => $this->setHeaders(),
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => json_encode($this->data)
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_XOAUTH2_BEARER => 'tocken'
    ]);
  }
}

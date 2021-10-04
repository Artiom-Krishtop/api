<?php
namespace Config;
use Config\Method as Method;
/**
 *
 */
class Put implements Method
{
  const private METHOD_TYPE = 'PUT';

  public function set_options(&$curl, $data)
  {

    curl_setopt_array($curl, [
      CURLOPT_CUSTOMREQUEST => METHOD_TYPE,
      CURLOPT_HTTPHEADER => $this->setHeaders(),
      CURLOPT_PUT => true,
      CURLOPT_POSTFIELDS => json_encode($this->data)
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_XOAUTH2_BEARER => 'tocken'
    ]);
}

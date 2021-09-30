<?php
// namespace api\order;
// use components\Request as Request;



class Request implements interfaceRequest
{
  private $url;
  private $data = [];
  private $header = [];

  public function methodGET(){
    $curl = curl_init($this->url);
    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');
    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
  }

  public function methodPOST(){
    $curl = curl_init($this->url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CERLOPT_POSTFIELDS, $this->data);
    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');

    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
  }

  public function methodPUT(){
    $curl = curl_init($this->url);
    curl_setopt($curl, CURLOPT_PUT, true);
    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');

    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
  }
}

<?php
namespace components;

// класс для HTTP запросов

class Request
{
  public $url;
  public $data = [];
  public $header = [];

  function __construct($url, $data = null, $header = null)
  {
    $this->url = $url;
    $this->data = $data;
    $this->header = $header;
  }

  public function GET()
  {
    $curl = curl_init($this->url);

    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }

  public function POST()
  {
    $curl = curl_init($this->url);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }

  public function PUT()
  {
    $curl = curl_init($this->url);

    curl_setopt($curl, CURLOPT_PUT, true);
    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }
}

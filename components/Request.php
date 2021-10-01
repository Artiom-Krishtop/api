<?php
namespace components;

// класс для HTTP запросов

class Request
{
  public function GET($url)
  {
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
  }

  public function POST($url, $headers , $data)
  {
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
  }

  public function PUT()
  {
    $curl = curl_init($this->url);

    curl_setopt($curl, CURLOPT_PUT, true);
    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
  }
}

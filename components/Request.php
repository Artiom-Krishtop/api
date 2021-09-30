<?php
namespace components;

// класс для HTTP запросов

class Request
{
  private $url;
  private $data = [];
  private $header = [];

  // метод для установки данных в запрос
  public function setData($requestData)
  {
    $this->data = $requestData;
  }

  // установка заголовков
  public function setHeader($requestHeader)
  {
    $this->header = $requestHeader;
  }

  // установка URL 
  public function setURL($url)
  {
    $this->url = $url;
  }

  public function GET()
  {
    $curl = curl_init($this->url);

    curl_setopt($curl, CURLOPT_XOAUTH2_BEARER, 'tocken');
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }

  public function POST()
  {
    $curl = curl_init($this->url);

    curl_setopt($curl, CURLOPT_HTTPHEADER, $this->header);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $this->data);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
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
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
  }
}

<?php
namespace models\order;

use components\Request as Request;

// класс для работы с заказами

class Order
{
  private $url = 'http://1162trainee.dev-bitrix.by/api/order/answer.json';
  protected $data;

  function __construct()
  {
    $this->data = new Request($this->url);
  }

  public function getListOrder()
  {
    $responseData = $this->data->GET();
    return $responseData;
  }

  public function getOrder($id)
  {
    $responseData = $this->data->GET();

    $responseData = json_decode($responseData, true);

    // если вложеннсть данных большая?
    for ($i=0; $i < 2 ; $i++) {
      if ($responseData[$i]['id'] == $id) {
        echo (json_encode($responseData[$i], JSON_UNESCAPED_UNICODE));
        return $responceData[$i];
      }
    }

  }

  public function createOrder($createData)
  {
    $createData = json_encode($createData, JSON_UNESCAPED_UNICODE);

    $responseData = $this->data->POST();

    echo $responseData;

    return $responseData;
  }
}

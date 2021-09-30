<?php
namespace models\products;
use components\Request as Request;

// класс для работы с продуктами

class Products
{
  private $url = 'http://1162trainee.dev-bitrix.by/api/products/answerProducts.json';
  protected $data;

  function __construct()
  {
    $this->data = new Request($this->url);
  }

  public function getListProducts()
  {
    $responseData = $this->data->GET();
    
    return $responseData;
  }

  public function getProduct($id)
  {
    $responseData = $this->data->GET();

    $responseData = json_decode($responseData, true);

    // если вложеннсть данных большая?
    for ($i=0; $i < 2 ; $i++) {
      if ($responseData[$i]['id'] == $id) {
        var_dump(json_encode($responseData[$i],JSON_UNESCAPED_UNICODE));
        return $responseData[$i];
      }
    }
  }

}

<?php
namespace collection;



Class Product implements Entity
{
  private $collection;


  function __construct()
  {
    $this->collection = new Collection(URIAPI,'products');
  }

  public function getProducts()
  {
    $result = $this->collection->getItem();

    return $result;
  }

  public function getProductsBiId($id)
  {
    $result = $this->collection->getItem();

    foreach ($result as $product) {
      if ($product->id == $id) {
        return $product;
      }
    }
    echo 'Такого товара не суцществует';
  }
}

<?php
namespace collection;



Class Product implements Entity
{
  private $id;
  private $name;
  private $stock;
  private $price;



  function __construct($field)
  {
    $this->id = (int)$field['id'];
    $this->name = $field['name'];
    $this->stock = $field['stock'];
    $this->price = $field['price'];
  }

  public function create($field, $value)
  {
    switch ($field) {

      case 'name':
        $this->name = $value;
        break;

      case 'stock':
        $this->stock = $value;
        break;

      case 'price':
        $this->price = $value;
        break;
    }
  }

  public function getId()
  {
    return $this->id;
  }
}

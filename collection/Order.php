<?php
namespace collection;

/**
 *
 */
class Order implements Entity
{
  private $id;
  private $title;
  private $status;
  private $products = [];

  function __construct(array $field)
  {
    $this->id = $field['id'];
    $this->title = $field['title'];
    $this->status = $field['status'];
    $this->products = $field['products'];
  }

  public function getId()
  {
    return $this->id;
  }

  public function create($field, $value)
  {
    switch ($field) {
      case 'title':
        $this->title = $value;
        break;

      case 'status':
        $this->status = $value;
        break;
    }
  }

  public function addProduct(array $product)
  {
    $this->produts[] = $product;
  }
}

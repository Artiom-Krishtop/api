<?php


/**
 *
 */
class Products extends Request
{
  function __construct($url, $data = null, $header = null){
    $this->url = $url;
    $this->data = $data;
    $this->header = $header;
  }

  public function getListProducts()
  {
    $this->methodGET();
  }

  public function getProduct($id)
  {
    $result = $this->methodGET();
  }

}

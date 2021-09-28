<?php
namespace api\products;

/**
 *
 */
interface Products
{
  public function getList();
  public function getProduct($id);
}

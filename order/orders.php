<?php
namespace api\orders;

/**
 *
 */
interface InterfaceOrders
{
  public function getListOrders();
  public function getOrderById($id);
  public function createOrder($id, $title, $status);
}

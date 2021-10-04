<?php
namespace Entity;



/**
 *
 */
interface Entity
{
  public function offsetSet($key, $value);
  public function offsetGet($key);
  public function offsetExists($key);
}

<?php
namespace collection;



/**
 *
 */
interface Entity
{
  public function create($field, $value);
  public function getId();
}

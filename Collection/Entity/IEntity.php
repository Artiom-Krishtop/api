<?php

namespace Collection\Entity;

interface IEntity
{
  public function getId();
  public function getById();
  public function edit($key, $value);
  public function create();
  public function save();
}

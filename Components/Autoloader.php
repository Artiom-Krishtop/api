<?php
namespace components;

function autoload($class)
{

  $class = str_replace('\\', '/', $class);

  $path =  ROOT  . '/' . $class . '.php';
  
  if (is_file($path)) {
    include_once $path;
  }
}

spl_autoload_register('components\autoload');

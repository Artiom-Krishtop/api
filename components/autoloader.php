<?php
namespace api\components;

function autoload($class)
{
  $array_paths = [
    '/products/',
    '/order/',
    '/components/'
  ];

  foreach ($array_paths as $paths) {
   $path =  ROOT  . $paths . $class . '.php';
   if (is_file($path)) {
     include_once $path;
   }
  }
}

spl_autoload_register('api\components\autoload');

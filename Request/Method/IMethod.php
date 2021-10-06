<?php
namespace Request\Method;

use Request\Config\Uri;

interface IMethod
{
  public function set_options(&$curl,Uri $uri, $data = null);
}

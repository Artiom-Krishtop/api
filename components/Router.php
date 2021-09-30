<?php




class Router
{
  public $url;

  function __construct(){
    include ROOT . '/config/routes.php';
  }

  public function getURI(){
    if (!empty($_SERVER['REQUEST_URI'])) {
      $this->url = $_SERVER['REQUEST_URI'];
    }
  }

  public function run(){
    $this->getURI();
    echo $this->url;
  }
}

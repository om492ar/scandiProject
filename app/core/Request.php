<?php


namespace Omar\Scandi\core;


class Request {
  public function getPath(){
    $path = $_SERVER['REQUEST_URI']??'/';
    $possition = strpos($path,'?');
    if($possition===false){
      return $path;
    }
    return substr($path,0,$possition);
  }

  public function getMethod(){
    return strtolower($_SERVER['REQUEST_METHOD']);
  }

  public function getData(){
    $resu= file_get_contents("php://input");
    $res=json_decode($resu);
    return $res;
  }
}
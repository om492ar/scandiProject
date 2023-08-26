<?php 


namespace Omar\Scandi\core;


class Response {

  public function setStatusCode(int $code){
    http_response_code($code);
  }

  public function sendData($result){
  echo(json_encode($result));

  }

}

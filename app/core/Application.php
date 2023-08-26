<?php

namespace Omar\Scandi\core;


class Application {
  public static string $ROOT_DIR;
  public Router $router;
  public Request $request;
  public Response $response;
  public Database $database;
  public static Application $app;
  public function __construct($rootPath)
  {
    self::$ROOT_DIR = $rootPath;
    self::$app = $this;
    $this->request = new Request();
    $this->response = new Response();
    $this->database = new Database();
    $this->router = new Router($this->request,$this->response);
    // var_dump($this->router);
  }
    public function run(){
     echo $this->router->resolve();
    }

  
}
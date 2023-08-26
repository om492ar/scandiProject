<?php

namespace Omar\Scandi\core;
use Omar\Scandi\controllers\ProductController;
use Omar\Scandi\controllers\_404Controller;

class Router {
  const _404CALLBACK = [_404Controller::class,"index"];
  public Request $request;
  public Response $response;
  public array $routes=[];
  public function __construct(Request $request,Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }
    public function get($path,$callback){

      $this->routes['get'][$path]=$callback;
    
      
    }
    public function post($path,$callback){
      $this->routes['post'][$path]=$callback;
    }
    
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        // var_dump($this->routes);
        if(!$callback){
           $callback = self::_404CALLBACK;
        }
        if(is_array($callback)){
            $controller = new $callback[0]();
            $method = $callback[1];

            call_user_func_array( [ $controller ,$method],[$this->request,$this->response]);
        }
    }



}

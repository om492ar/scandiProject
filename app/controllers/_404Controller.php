<?php
namespace Omar\Scandi\controllers;
use Omar\Scandi\core\Controller;
class _404Controller extends Controller{

  public function index(){
    $this->view("404");
  }
}
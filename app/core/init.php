<?php
spl_autoload_register(function($classname){
  require $filename = "../app/models/".ucfirst($classname).".php";
});

require "config.php";
require "function.php";
require "App.php";
require "Controller.php";
require "Database.php";
require "Model.php";

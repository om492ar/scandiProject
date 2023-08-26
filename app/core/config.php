<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
  /** database config **/
  define('DBNAME','task_db');
  define('DBHOST','localhost');
  define('DBUSER','root');
  define('DBPASS','');
  define('DBDRIVER','');
  define('ROOT', 'http://localhost:5000');
}else{
  /** database config **/
  define('DBNAME','id21174206_task_db');
  define('DBHOST','localhost');
  define('DBUSER','id21174206_omar');
  define('DBPASS','@Omarmostafa14992');
  define('DBDRIVER','');
  define('ROOT','https://scandiprojectomar.000webhostapp.com');
}

define('APP_NAME',"My Website");
define('APP_DESC',"Best Website");

/** true means show errors **/
define('DEBUG', true);


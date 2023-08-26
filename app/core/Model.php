<?php
namespace Omar\Scandi\core;
use Omar\Scandi\core\Database;

class Model extends Database
{

  protected $table        = "products";
  protected $limit        = 10;
  protected $offset       = 0;
  protected $order_type   = "desc";
  protected $order_column = "id";
  public    $errors       = [];

  public function findAll()
  {
    $query = "select * from $this->table";
    // echo $query;                         
    return $this->query($query);
  }
  public function lastid()
  {

    $query = "SELECT MAX( id ) as id FROM $this->table";
                       
    return $this->query($query);
  }
  public function where($data, $data_not=[])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);
    $query = "select * from $this->table where ";
    foreach($keys as $key) {
      $query .= $key." = :".$key." && ";
    }
    foreach($keys_not as $key) {
      $query .= $key." != :".$key." && ";
    }
    $query = trim($query, " && ");

    $query .= " limit $this->limit offset $this->offset";
    // echo $query;
    $data = array_merge($data, $data_not);
    return $this->query($query, $data); 

  }

  public function first($data, $data_not= [])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);
    $query = "select * from $this->table where ";
    foreach($keys as $key) {
      $query .= $key." = :".$key." && ";
    }
    foreach($keys_not as $key) {
      $query .= $key." != :".$key." && ";
    }
    $query = trim($query, " && ");

    $query .= " limit $this->limit offset $this->offset";
    // echo $query;
    $data = array_merge($data, $data_not);
  $result = $this->query($query, $data);
  if($result)
    return $result[0];

  return false;  

  }
  public function insert($data)
  {
  
   
    /** remove unwanted data **/
    if(!empty($this->allowedColumns)){
      foreach($data as $key => $value){
        if(!in_array($key,$this->allowedColumns)){
          unset($data[$key]);
        }
      }
    }
    $key = array_keys($data);
    
    $query = "insert into $this->table (".implode(",",$key).") values (:".implode(",:",$key).")";
    $this->query($query,$data);
    return false;
  }
  

  public function update($id, $data, $id_column = 'id')
  {
    /** remove unwanted data **/
    if(!empty($this->allowedColumns)){
      foreach($data as $key => $value){
        if(!in_array($key,$this->allowedColumns)){
          unset($data[$key]);
        }
      }
    }
    $keys = array_keys($data);
    $query = "update $this->table set ";
    foreach($keys as $key) {
      $query .= $key." = :".$key.", ";
    }
    $query = trim($query, ", ");
    $query .= " where $id_column = :$id_column";
    $data[$id_column]= $id;
    // echo $query;    
    $this->query($query, $data);
    return false;
  }

  public function delete($id, $id_column = 'id')
  {
    $data[$id_column]= $id;
    $query = "delete from $this->table where $id_column = :$id_column";
    $this->query($query, $data);
    return false;
  }

}



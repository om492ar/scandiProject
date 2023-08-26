<?php

namespace Omar\Scandi\models;
use Omar\Scandi\core\Model;
class Attributes extends Model
{
  public $id;
  public $name;
  public $type_id;
  protected $table = "attributes";
  protected $allowedColumns = [
      'id',
      'name',
      'type_id',
  ];

public function validate($data)
{
  $this->errors = [];
  if(empty($data['type_id']))
  {
    $this->errors['type_id'] = "Type is required";
  }
  if(empty($this->errors))
  {
    return true;
  }
  return false;
}
}

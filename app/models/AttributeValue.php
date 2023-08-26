<?php

namespace Omar\Scandi\models;
use Omar\Scandi\core\Model;
class AttributeValue extends Model
{

  public $product_id;
  public $type_id;
  public $attribute_id;
  public $value;
  protected $table = "product_type_attribute_value";
  protected $allowedColumns = [
    
      'product_id',
      'type_id',
      'attribute_id',
      'value',
  ];


  public function setProductId($product_id) {
    $this->product_id = $product_id;
  }
  public function getProductId() {
    return $this->product_id;
  }
  public function setTypeId($type_id) {
    $this->type_id = $type_id;
  }
  public function getTypeId() {
    return $this->type_id;
  }
  public function setAttributeId($attribute_id) {
    $this->attribute_id = $attribute_id;
  }
  public function getAttributeId() {
    return $this->attribute_id;
  }
  public function setValue($value) {
    $this->value = $value;
  }
  public function getValue() {
    return $this->value;
  }


  public function setAttrData($data, $lastId) {
    foreach ($data->attributes as $attribute) {
      
      $product_id = $lastId[0]->id;
      $type_id = $attribute->item->type_id;
      $attribute_id = $attribute->item->id;
      $value = $attribute->item->value;
      $attributes = ["product_id"=>$product_id, "type_id"=>$type_id, "attribute_id"=>$attribute_id, "value"=>$value];
      $this->insert($attributes);
    }
  }
  
  public function validate($data)
  {
    foreach ($data->attributes as $attribute) {
      $attributeName = $attribute->item->name;
      $value = $attribute->item->value;
    if(empty($value))
    {
      $this->errors[$attributeName] = "Please, provide the data of $attributeName";
    }
  }
    if(empty($this->errors))
    {
      return true;
    }
    return false;
}
}
<?php
namespace Omar\Scandi\models\product;

use Omar\Scandi\core\Model;
use Omar\Scandi\models\product\productInterface;

abstract class Product extends Model implements productInterface
{


  private $sku;
  private $name;
  private $price;
  private $typeId;
  private $attributesValue;
  private $attributesId;
  protected $table = "products";
  protected $allowedColumns = [
    'SKU',
    'name',
    'price',
    'type_id',
    'attributes_value',
  ];
  public function handleData($data){
    // var_dump($data);
    $SKU = $data->SKU;
    $name = $data->name;
    $price = $data->price;
    $type_id = $data->type_id;
    $attribute_value = "";
    $attribute_value = $this->setFrontendAttr($data->attributes);
    // var_dump($attribute_value);
    return ["SKU" => $SKU, "name" => $name, "price" => $price, "type_id" => $type_id, "attributes_value" => $attribute_value];
  }
  abstract public function setFrontendAttr($attributes);
  public static function model()
  {
    return new Model;
  }


 
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data->SKU)) {
      $this->errors['SKU'] = "SKU is required";
    }
    if (!empty($this->where(["SKU"=>$data->SKU]))) {
      $this->errors['SKU'] = "This SKU is already used";
    }

    if (empty($data->name)) {
      $this->errors['name'] = "Please, provide the data of Name";
    }

    if (empty($data->price)) {
      $this->errors['price'] = "Please, provide the data of Price";
    }
    if (empty($data->type_id)) {
      $this->errors['type_id'] = "Please, provide the data of Type";
    }
    if (empty($data->attributes)) {
      $this->errors['attributes'] = "Please, provide the data of Attributes";
    }
    if (empty($this->errors)) {
      return true;
    }
    return false;
  }

  
  public function setSku($sku)
  {
    $this->sku = $sku;
  }

  public function getSku()
  {
    return $this->sku;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setPrice($price)
  {
    $this->price = $price;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setTypeId($typeId)
  {
    $this->typeId = $typeId;
  }

  public function getTypeId()
  {
    return $this->typeId;
  }
  public function setAttributesValue($attributesValue)
  {
    $this->attributesValue = $attributesValue;
  }

  public function getAttributesValue()
  {
    return $this->attributesValue;
  }
  public function setAttributesId($attributesId)
  {
    $this->attributesId = $attributesId;
  }

  public function getAttributesId()
  {
    return $this->attributesId;
  }

}
<?php
namespace Omar\Scandi\models\product;
use Omar\Scandi\core\model;
use Omar\Scandi\models\product\Product;
class DVD extends Product{
  public function setFrontendAttr($attributes){
   return  'Size: ' . $attributes[0]->item->value . ' MB';
  }
}
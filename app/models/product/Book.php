<?php
namespace Omar\Scandi\models\product;
use Omar\Scandi\models\product\Product;
class Book extends Product {
  public function setFrontendAttr($attributes ){
    return 'Weight: ' . $attributes[0]->item->value . 'KG';
   }
}
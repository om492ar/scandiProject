<?php
namespace Omar\Scandi\models\product;
use Omar\Scandi\models\product\Product;
class Furniture extends Product {
    public function setFrontendAttr($attributes ){
      return 'Dimensions: ' . $attributes[0]->item->value . '*' . $attributes[1]->item->value . '*' . $attributes[2]->item->value;
     }
}
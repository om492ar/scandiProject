<?php
namespace Omar\Scandi\models\product;
use Omar\Scandi\core\Model;
use Omar\Scandi\models\product\DVD;
use Omar\Scandi\models\product\Furniture;
use Omar\Scandi\models\product\Book;
class productFactory{
    public function create($type_name) {
        $product =  "Omar\\Scandi\\models\\product\\$type_name";
        return new $product;
    }
}
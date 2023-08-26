<?php
namespace Omar\Scandi\models\product;
use Omar\Scandi\core\Model;


interface productInterface{
public function handleData($data);
public function setFrontendAttr(array $attributes);
}

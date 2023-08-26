<?php

namespace Omar\Scandi\controllers;
use Omar\Scandi\core\Controller;
use Omar\Scandi\core\Request;
use Omar\Scandi\core\Response;
// use Omar\Scandi\models\product\Product;
// use Omar\Scandi\models\product\DVD;
// use Omar\Scandi\models\product\Furniture;
// use Omar\Scandi\models\product\Book;
use Omar\Scandi\models\product\productFactory;
use Omar\Scandi\models\Attributes;
use Omar\Scandi\models\AttributeValue;

class ProductController extends Controller
 {
  const DEFAULT_CLASS = "DVD";
   
   public function create(){
     $this->view('addproduct');
   }


   public function getAttribute(Request $request, Response $response)
   {
     $data = $request->getData();
     if($data)
     {
       $type_id=$data[0];
       $arr['type_id'] = $type_id;
       $attributes = new Attributes;
       $attributes= $attributes->where($arr);
       $response->sendData($attributes);
     }

   }

    public function add(Request $request, Response $response)
    {
      $data = $request->getData();
      $productFactory = new productFactory();
      $type_name = !empty($data->type_name) ? $data->type_name : self::DEFAULT_CLASS;
      $product = $productFactory->create($type_name);
      if($product->validate($data))
      {       
        // var_dump($data);
              $finalData = $product->handleData($data);
              $attributeValue = new AttributeValue;
              if($attributeValue->validate($data)) {
                $product->insert($finalData);
                $lastId = $product->lastid();
                    $attributeValue->setAttrData($data, $lastId);
                    $response->sendData(["message"=>"success"]);
              }else{
                    $errors = $attributeValue->errors;
                    $response->sendData(["message"=>"fail","errors"=>$errors]);
              }
            }else{
              $errors = $product->errors;
              $response->sendData(["message"=>"fail","errors"=>$errors]);
            }
        }


 }
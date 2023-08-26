<?php

namespace Omar\Scandi\controllers;
use Omar\Scandi\core\Controller;
use Omar\Scandi\core\Request;
use Omar\Scandi\core\Response;
use Omar\Scandi\models\product\Product;
use Omar\Scandi\models\AttributeValue;


class HomeController extends Controller
 {
   
   public function page(){
       $this->view('home');
   }
   public function findAll(Request $request, Response $response)
   {
     $data = $request->getData();
     $product = product::model();
     $products = $product->findAll();
     $response->sendData($products);
   }

   public function delete(Request $request, Response $response)
   {
     $data = $request->getData();
     $product = product::model();
     $attributeValue = new AttributeValue;

     foreach ($data as $value) {
       var_dump($value);
       $product->delete($value);
       $attributeValue->delete($value,"product_id");
     }
    }


 }
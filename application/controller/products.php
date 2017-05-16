<?php

/*
 * Products controller, to manage API-model interactions
 *
 * Products can be:
 * Marcado = 0 -> Ordered
 * Marcado = 1 -> cooked
 * Marcado > 1 -> delivered
 *
 * When they are delivered they are erased from the data storage
 */

class Products extends Controller{

   // index() will list all products
   private $param = null;

   function index(){

     //Get products from the Model
     $products =  $this->model->get_products();

     //Encode screens
     $response = json_encode($products);

     //Echo the response to the client
     echo $response;

   }

   //put will update the products list, deleting the server one

   function put($param){

    //Get products from the Model
    $products =  $this->model->get_products();


    // Define a new temp array
    $data2 = array();

    //Filter the served product from the array
    foreach ($products as $product) {

        if($param[6] == 1){

          // Marcado a marchar

          // Test for product match in products array
          if(($product['idImpresora'] == $param['0']) &&
             ($product['idTPV'] == $param['1']) &&
             ($product['idTicket'] == $param['2']) &&
             ($product['idLinea'] == $param['3']) &&
             ($product['idSublinea'] == $param['4']) &&
             ($product['idCombSub'] == $param['5'])

        ){
          // If match: Update the Marcado property and add the product to the
          // new Array data2

          $product['Marcado'] = 1;
          $data2[]=$product;

        }else{
          $data2[]=$product;
        }

        }else{

          if(($product['idImpresora'] == $param['0']) &&
             ($product['idTPV'] == $param['1']) &&
             ($product['idTicket'] == $param['2']) &&
             ($product['idLinea'] == $param['3']) &&
             ($product['idSublinea'] == $param['4']) &&
             ($product['idCombSub'] == $param['5'])){

          }else{
            $data2[]=$product;
          }

        }
      }

      // Proccess data, update it on the model and echo a response to the client
      $response = json_encode($data2, JSON_PRETTY_PRINT);
      $this->model->update_data($response);
      echo $response;

   }
}

?>

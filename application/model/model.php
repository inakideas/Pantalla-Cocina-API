<?php

class Model
{
  // List all products
  public function get_products(){

    //Retrieve the data, in this scenario the json File
    $raw = file_get_contents('data/products.json');

    // Process data, we need all
    $data = json_decode($raw, true);



    return $data;

  }

  // Update products list in storage
  public function update_data($json_file){
    file_put_contents('data/products.json', $json_file);
  }
}

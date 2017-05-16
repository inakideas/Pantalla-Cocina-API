<?php

/*
 * Controller core, defines how controler & model should interact
 */

class Controller
{

    public $model = null;

    // When a controller is created open a db connection and load the model
    function __construct()
    {
      //Here I use to open de db connection
      $this->loadModel();
    }


    // Load the model and initiate it
    public function loadModel()
    {
        require APP . 'model/model.php';
        $this->model = new Model();
    }


}
?>

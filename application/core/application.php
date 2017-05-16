<?php

class Application
{

    private $url_controller = null;
    private $api_key = null;
    private $param = null;


    public function __construct()
    {
        // Create array with URL parts in $url
        $this->splitUrl();

        // Check for any kind of action & API KEY or die trying it
        if ($this->url_action  && isset($this->api_key)) {


            // If we provide the controller's name "screens" & an api key start checking the key

            if($this->api_key != API_KEY){
              die('Bad Request - API KEY Not Valid');
            };

            require APP . 'controller/products.php';

            $controller = new Products;

            // If keys match: 1- check if it's an "all" request

            if($this->url_action == 'all'){
               $controller->index();
            }else{
              $controller->put($this->params);
             }




            // We could pass a client_id to the controller as parameter
            // And work with it in the model

        } else {


              die('Something went wrong, please contact support. Requested URL:'.$_SERVER['REQUEST_URI']);
        }
    }

    // Split and begin processing URL
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $params = $url;




            // Put URL parts into according properties
            $this->url_action = isset($url[0]) ? $url[0] : null;
          //  $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0]);

            // Get the api key
            $this->api_key = $_GET['api_key'];

            //Get the params
            $this->params = $params;



            // It would be a great idea to retrieve some client_id too
            // in order to be able to scale the service to more companies
            // we would fetch the cliendt_id in the model and we'd
            // get from storage only the screens for that client_id
        }
    }
}

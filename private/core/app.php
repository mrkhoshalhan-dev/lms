<?php
//  main app file
 class app 
{
    protected $controller = "home";
    
    protected $method= "index";
    protected $params= array();
    function __construct()
    {
        
      $URL=  $this->getURL();
      if(file_exists("../private/controllers/".$URL[0].".php")){
      $this->controller =$URL[0];
      unset($URL[0]);
    }
    require "../private/controllers/".$this->controller.".php";
    $this->controller =new $this->controller();
    }
    //pr
    private function getURL(){
        $url=isset($_GET['url']) ? $_GET['url']:"home";
   return explode("/",filter_var( trim($url,"/")),FILTER_SANITIZE_URL);
    }
    
}

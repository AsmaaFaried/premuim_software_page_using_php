<?php

class ApiHelper{

   private $method="get";
   private $resource;
   private $resource_id;
   private $body_resource;
   private $url;

    public function __construct()
    {
     $this->method =$this->get_method(); 
     $this->  read_resource();
     if($this->resource==="" || $this->resource ===-1){
        $this->output(array("Error"=>"Resource doesn't exist"),404);
     } 
    }


    public function output($data,$respose_code=200){
       http_response_code($respose_code);
       header("Content-Type: application/json");
       echo json_encode($data);
       exit();
    }


    public function get_method(){
        $allowed=array("get","post","delete");
        if(in_array(strtolower($_SERVER["REQUEST_METHOD"]),$allowed)){
            return strtolower($_SERVER["REQUEST_METHOD"]);
        }else{
            $this->output(array("Error"=>"Not supported Method"),405);
        }

       
    }

    private function read_resource(){
        $this->url=$_SERVER["REQUEST_URI"];
        $pieces=explode("/",$this->url);
        $allowed=array("users","tokens");
        $this->resource=in_array($pieces[3],$allowed)?$pieces[3]:"";
        if(isset($pieces[4])){
            $this->resource_id =is_numeric($pieces[4])?$pieces[4]:-1;
        }

        
    }

    public function get_resource_id(){
        return $this->resource_id;
    }
    public function get_resource(){
        return $this->resource;
    }

    public function get($data){
        $this->output(array("data"=>$data),200);
    }
    public function post($data){
        if($data){
            $this->output(array("data"=>"Data is inserted successfuly"),200);
        }
       
    }

    public function delete($data){
        if($data){
            $this->output(array("data"=>"Data is deleted successfuly"),200);
        }
       
    }
    
}



?>
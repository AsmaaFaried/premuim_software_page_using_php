<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {

    private $api;
    private $capsule;


    function __construct() {
       $this->capsule = new Capsule();
       $this->capsule->addConnection([
            "driver" => _driver_,
            "host" => _host_,
            "database" => _database_,
            "username" => _username_,
            "password" => _password_
        ]);
       $this->capsule->setAsGlobal();
       $this->capsule->bootEloquent();
        $this->api=new ApiHelper($this->capsule);
    }

    public function Table($table) {
        return Capsule::table($table);
    }


///////////////////////////////////   API   /////////////////////////////////////////////


    /// API get and post,delete data of user /////
    public function get_user_date(){

        $id=$this->api->get_resource_id();
        $tableName=$this->api->get_resource();
        if($this->api->get_method()=="get"){
            echo "id".$id;
            if(empty($id)){
                $data=$this->capsule::table($tableName)->get();
            }else{
                    $data=$this->capsule::table($tableName)->where("user_id","=",$id)->get();
                
            }
            $this->api->get($data); 
        }
        if($this->api->get_method()=="post"){

            if(strtolower($tableName) ==="users"){
                if($id == -1){
                    $this->api->output(array("Error"=>"Please put id to insert data"),405);
                   
                }else{
                  
                    $data=$this->capsule::table("users")->insert([
                        "user_id"=>$id,
                        "user_email"=>"asmaa@gmail.com",
                        "password"=>sha1("asmaafaried"),
                    ]);
                    $this->api->post($data);
                    
                }
                
            }
        
            $this->api->output(array("Error"=>"There is an error happened"),405);
                
        }
        if($this->api->get_method()=="delete"){
            if(empty($id)){
                $this->api->output(array("Error"=>"Please Enter Id to delete user"),405);
            }else{
                $data=$this->capsule::table("users")->where('user_id', $id)->delete();
                $this->api->delete($data);   
            }
             
        }
        
    }
 /////////////////////// API End ///////////////////////////////


   
}

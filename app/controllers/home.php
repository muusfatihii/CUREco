<?php


spl_autoload_register(function($class){

    require_once('../app/lib/'.$class.'.php');

});

class Home extends Controller{


    public function index($params=[]){

        $this->view('home/index',$params);

    }


}

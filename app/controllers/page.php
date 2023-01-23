<?php


spl_autoload_register(function($class){

    require_once('../app/lib/'.$class.'.php');

});



class Page extends Controller{

    public function signin($params=[]){
        

        $this->view('signinPage',[]);

    } 

    public function signup($params=[]){
        

        $this->view('signupPage',[]);

    } 

    public function dashboard($params=[]){


        $page =1;
        $limit=2;
        $startFrom=($page-1)*$limit;

        $dbconnection = new DatabaseConnection();
        $productRepo = $this->model('ProductRepo');
        $productRepo->dbconnection = $dbconnection;

        
        $results = $productRepo->getProducts($startFrom,$limit);
        $products =  $this->getProductsObj($results);

        $data["products"] =  $products;
        

        $this->view('dashboard',$data);

    } 


    public function getProductsObj($results):array
    {
        

        $products = [];

        foreach($results as $result){

            $product = new Product();

            $product->id = $result['id'];
            $product->name = $result['name'];
            $product->price = $result['price'];
            $product->quantity = $result['quantity'];
            $product->pic = $result['pic'];
            $product->addDate = $result['addDate'];

            $products[]=$product;
        }


        return $products;

    }

}
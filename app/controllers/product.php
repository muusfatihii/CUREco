<?php


spl_autoload_register(function($class){

    require_once('../app/lib/'.$class.'.php');

});

class Product extends Controller{


    public function show($params=[]){


        $limit=$_POST['limit'];

        if(isset($_POST['page']) && !empty($_POST['page'])){

            $page=$_POST['page'];

        }else{

            $page=1;
        }

        if(isset($_POST['priceOrder']) && !empty($_POST['priceOrder'])
        && isset($_POST['addDateOrder']) && !empty($_POST['addDateOrder'])){


            $priceOrder=$_POST['priceOrder'];
            $addDateOrder=$_POST['addDateOrder'];

        }else{

            $priceOrder="none";
            $addDateOrder="none";
        }

        if(!isset($_POST['update'])){

            $startFrom = ($page-1)*$limit;

        }else{

            if($_POST['update']=="yes"){

                $startFrom = 0;

            }
        }
        
        $results = $this->getFilteredProducts($priceOrder,$addDateOrder,$startFrom,$limit);
        $products = $this->getProductsObj($results);


        if($page==1 && !isset($_POST['page']) && !isset($_POST['update'])){

            $data["products"]=$products;

            $this->view('dashboard',$data);

        }else{

            echo json_encode($products);

            exit();

        }
        
    }


    public function getFilteredProducts($priceOrder,$addDateOrder,$startFrom,$limit){

        $dbconnection = new DatabaseConnection();

        $productRepo = $this->model('ProductRepo');
        $productRepo->dbconnection = $dbconnection;

        if($priceOrder!="none" && $addDateOrder!="none"){



            if($priceOrder=="up" && $addDateOrder=="up"){


                $results = $productRepo->getProductsUU($startFrom,$limit);
    
            }else{
    
                if($priceOrder=="down" && $addDateOrder=="up"){
    
    
                    $results = $productRepo->getProductsDU($startFrom,$limit);
    
                }else{
    
                    if($priceOrder=="up" && $addDateOrder=="down"){
    
                        $results = $productRepo->getProductsUD($startFrom,$limit);
    
                    }else{
    
                        $results = $productRepo->getProductsDD($startFrom,$limit);
                        
                    }
    
                }
    
            }

        }else{

            if($priceOrder=="none" && $addDateOrder=="none"){

                $results = $productRepo->getProducts($startFrom,$limit);

            }

            

            if($priceOrder=="none" && $addDateOrder!="none"){


                if($addDateOrder=="up"){

                    $results = $productRepo->getProductsDateUp($startFrom,$limit);



                }else{

                    $results = $productRepo->getProductsDateDown($startFrom,$limit);


                }

            }

            if($addDateOrder=="none" && $priceOrder!="none"){

                if($priceOrder=="up"){

                    $results = $productRepo->getProductsPriceUp($startFrom,$limit);

                }else{

                    $results = $productRepo->getProductsPriceDown($startFrom,$limit);

                }

            }


        }
        
     return $results;

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

    public function delete($params){

        $limit = $_POST['limit'];
        $priceOrder = $_POST['priceOrder'];
        $addDateOrder = $_POST['addDateOrder'];

        $idProduct = $params;

        $dbconnection = new DatabaseConnection();

        $productRepo = $this->model('ProductRepo');
        $productRepo->dbconnection = $dbconnection;

        $success = $productRepo->deleteProduct($idProduct);

        if(!$success){

            throw new Exception("une erreur est survenue pendant la suppression de produit");


        }else{

            $results = $this->getFilteredProducts($priceOrder,$addDateOrder,0,$limit);
            $products = $this->getProductsObj($results);

            echo json_encode($products);
            exit();
        }



    }


    public function search($params=[]){

        $limit=$_POST['limit'];
        $page = $_POST['page'];


        $startFrom = ($page-1)*$limit;


        $keyword = $_POST['keyword'];

        $dbconnection = new DatabaseConnection();

        $productRepo = $this->model('ProductRepo');
        $productRepo->dbconnection = $dbconnection;

        $results = $productRepo->searchProduct($keyword,$startFrom,$limit);

        $products = $this->getProductsObj($results);

        echo json_encode($products);
        exit();


    }

    public function add($params=[]){

        $limit = $_POST['limit'];
        $priceOrder = $_POST['priceOrder'];
        $addDateOrder = $_POST['addDateOrder'];

        $i=1;

        $products = [];

        while(isset($_POST['productName'.$i])){

            if($_POST['productName'.$i]!='' &&
            isset($_POST['qtyProduct'.$i]) && $_POST['qtyProduct'.$i]!='' &&
            isset($_POST['priceProduct'.$i]) && $_POST['priceProduct'.$i]!=''){

                if(isset($_FILES['picProduct'.$i]) && $_FILES['picProduct'.$i]!='' && $_FILES['picProduct'.$i]['size']>0){


                    //ici le fichier téléchargé sera analysé pour définir son éligibilité
                    $picProduct = $this->addImage($_FILES['picProduct'.$i]);

                    $product = new Product();

                    $product->name = htmlspecialchars($_POST['productName'.$i]);
                    $product->quantity = htmlspecialchars($_POST['qtyProduct'.$i]); 
                    $product->price = htmlspecialchars($_POST['priceProduct'.$i]);
                    $product->pic = $picProduct;


                }else{

                    $product = new Product();

                    $product->name = htmlspecialchars($_POST['productName'.$i]);
                    $product->quantity = htmlspecialchars($_POST['qtyProduct'.$i]); 
                    $product->price = htmlspecialchars($_POST['priceProduct'.$i]);
                    $product->pic = "default.png";

                }

                $products [] = $product;

            }


            $i++;

        }

        
        $dbconnection = new DatabaseConnection();
        $productRepo = $this->model('ProductRepo');
        $productRepo->dbconnection = $dbconnection;

        $success = $productRepo->addProducts($products);


        if($success){

            $results = $this->getFilteredProducts($priceOrder,$addDateOrder,0,$limit);
            $products = $this->getProductsObj($results);

            echo json_encode($products);
            exit();

        }

            
    }

    public function description($params=[]){

        $idProduct = $_POST['idProduct'];

        $dbconnection = new DatabaseConnection();

        $productRepo = $this->model('ProductRepo');
        $productRepo->dbconnection = $dbconnection;

        $result = $productRepo->getProduct($idProduct);

        $product = new Product();

        $product->id = $idProduct;
        $product->name =  $result['name'];
        $product->price =  $result['price'];
        $product->quantity =  $result['quantity'];
        $product->addDate =  $result['addDate'];
        $product->pic =  $result['pic'];

        echo json_encode($product);
        exit();
    }


    public function addImage(array $picture):string
    {

        $new_img_name = "default.png";
    
        if(isset($picture) && !empty($picture)){
    
            $picname=$picture['name'];
            $pictmpname=$picture['tmp_name'];
    
            if($picture['size']>1000000){

                $em = "sorry your file is too large";
                header("Location: &em=$em");

            }else{

                $img_ex = pathinfo($picname, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
        
                $allowed_exs = array("jpg","jpeg","png");
        
                if(in_array($img_ex_lc,$allowed_exs)){
        
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path='uploads/'.$new_img_name;
                    move_uploaded_file($pictmpname,$img_upload_path);

                }else{
        
                    $em="only jpg,jpeg,png extensions are allowed";
                    header("Location: &em=$em");

                }
            }
        }
    
        return $new_img_name;
    
    }


    public function modify($params=[]){

            
            $idProduct = $_POST['idProduct'];

            if(isset($_POST['productName']) && $_POST['productName']!='' &&
            isset($_POST['qtyProduct']) && $_POST['qtyProduct']!='' &&
            isset($_POST['priceProduct']) && $_POST['priceProduct']!=''){

                if(isset($_FILES['picProduct']) && $_FILES['picProduct']!='' && $_FILES['picProduct']['size']>0){


                    //ici le fichier téléchargé sera analysé pour définir son éligibilité
                    $picProduct = $this->modifyImage($_FILES['picProduct']);

                    $product = new Product();

                    $product->id = $idProduct;
                    $product->name = htmlspecialchars($_POST['productName']);
                    $product->quantity = htmlspecialchars($_POST['qtyProduct']); 
                    $product->price = htmlspecialchars($_POST['priceProduct']);
                    $product->pic = $picProduct;


                    $dbconnection = new DatabaseConnection();
                    $productRepo = $this->model('ProductRepo');
                    $productRepo->dbconnection = $dbconnection;

                    $success = $productRepo->modifyProduct($product);


                }else{

                    $product = new Product();

                    $product->id = $idProduct;
                    $product->name = htmlspecialchars($_POST['productName']);
                    $product->quantity = htmlspecialchars($_POST['qtyProduct']); 
                    $product->price = htmlspecialchars($_POST['priceProduct']);

                    $dbconnection = new DatabaseConnection();
                    $productRepo = $this->model('ProductRepo');
                    $productRepo->dbconnection = $dbconnection;

                    $success = $productRepo->modifyProductNoPic($product);
                    

                }


            }else{

                throw new Exception("Champ obligatoir non inscrit !!!");
                
            }

            if($success){

                echo 1;
                exit();

            }

    }



            public function modifyImage(array $picture):string
        {

            $new_img_name = "default.png";

            if($picture['size']==0){
                return $new_img_name;
            }


            if(isset($picture) && !empty($picture)){

                $picname=$picture['name'];
                $pictmpname=$picture['tmp_name'];



                if($picture['size']>100000000){

                    $em = "sorry your file is too large";
                    header("Location: em=$em");

                }else{

                    $img_ex = pathinfo($picname, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
            
                    $allowed_exs=array("jpg","jpeg","png");
            
                    if(in_array($img_ex_lc,$allowed_exs)){
            
                        $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                        $img_upload_path='uploads/'.$new_img_name;
                        move_uploaded_file($pictmpname,$img_upload_path);

                    }else{
            
                        $em="only jpg,jpeg,png extensions are allowed";
                        header("Location: em=$em");
                    }
                }
            }

            return $new_img_name;

        }



        public function stats($params=[]){

            $dbconnection = new DatabaseConnection();

            $productRepo = $this->model('ProductRepo');
            $productRepo->dbconnection = $dbconnection;

            $result = $productRepo->getStatistics();


            if(empty($result['totalProducts'])){

                echo 1;
                exit();

            }else{

                $statis = new Stats();

                $statis->totalProducts = $result['totalProducts'];
                $statis->minPrice = $result['minPrice'];
                $statis->maxPrice = $result['maxPrice'];


                $stats = json_encode($statis);
                echo $stats;
                exit();

            }

        }

}
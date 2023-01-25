<?php

spl_autoload_register(function($class){

    require_once('../app/lib/'.$class.'.php');

});


class Auth extends Controller{

    public function signin($params=[]){

        if(isset($_POST['email']) && isset($_POST['password']) 
        && !empty($_POST['email']) && !empty($_POST['password']))
        {

            $connectiondb = new DatabaseConnection();

            $adminRepo = $this->model('AdminRepo');
            $adminRepo->connectiondb = $connectiondb;

            $auth=$adminRepo->checkAdmin($_POST);

            if(!$auth){

                $data["em"]="Ce compte n’existe pas";

                $this->view('signinPage',$data);

            }else{


                $_SESSION['admin']=1;

                $IdAdmin = $adminRepo->getIdAdmin($_SESSION['email']);
                $_SESSION['IdAdmin']=$IdAdmin;

                header ('Location: /projet/public');
            }

            
        }else{

            header ('Location: /projet/public/page/signin');

        }

    } 



    public function logout($params=[]){

        session_destroy();

        header ('Location: /projet/public/');

    }

    public function signup($params=[]){

        if(isset($_POST['firstname']) && !empty($_POST['firstname']) 
        && isset($_POST['lastname']) && !empty($_POST['lastname']) 
        && isset($_POST['email']) && !empty($_POST['email']) 
        && isset($_POST['password']) && !empty($_POST['password'])){
        
        $connectiondb = new DatabaseConnection();

        $adminRepo = $this->model('AdminRepo');
        $adminRepo->connectiondb = $connectiondb;

        $input['firstname']=$_POST['firstname'];
        $input['lastname']=$_POST['lastname'];
        $input['email']=$_POST['email'];


        $input['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $success = $adminRepo->addAdmin($input);


        if (!$success) {

            $data["em"]="Impossible d'ajouter l'administrateur !";

            $this->view('signupPage',$data);

        } else {

            $_SESSION['admin']=1;

            $IdAdmin = $adminRepo->getIdAdmin($_SESSION['email']);
            $_SESSION['IdAdmin']=$IdAdmin;

            header ('Location: /projet/public/');
        }

    }else{

        $data["em"]="Un des champs requis est vide!!";

        $this->view('signupPage',$data);

    }

    } 

}
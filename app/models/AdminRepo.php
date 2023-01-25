<?php



class AdminRepo
{

    public DatabaseConnection $connectiondb;

    public function addAdmin(array $input)
    {

        $firstname = $input['firstname'];
        $lastname = $input['lastname'];
        $email = $input['email'];
        $password = $input['password'];
        

        $statement = $this->connectiondb->getConnection()->prepare(
            "INSERT INTO `admin` (`firstname`, `lastname`, `email`, `password`) VALUES (?,?,?,?)"
        );

        $affectedLines = $statement->execute([$firstname, $lastname, $email, $password]);
        
        if($affectedLines > 0){

            $_SESSION['email'] = $email;
        }

        return ($affectedLines > 0);
    }



public function checkAdmin(array $input)
{
    $statement = $this->connectiondb->getConnection()->prepare(
        "SELECT `id`,`password` FROM `admin` WHERE `email` = ?"
    );

    $statement->execute([$input['email']]);

    $row = $statement->fetch();

    $auth = ($row && password_verify($input['password'],$row['password']));


    if($auth){

        $_SESSION['email'] = $input['email'];

        return true;

    }else{

        return false;
    }

    

   }


   public function getIdAdmin(string $email):string
   {

    $statement = $this->connectiondb->getConnection()->prepare(
        "SELECT `id` FROM `admin` WHERE `email` = ?"
    );

    $statement->execute([$email]);

    $row = $statement->fetch();

    return $row['id'];
    
   }


}
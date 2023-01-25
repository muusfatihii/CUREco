<?php



class ProductRepo
{

    public DatabaseConnection $dbconnection;


    public function getProducts($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }

    public function getProductsDateUp($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `addDate` ASC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }

    public function getProductsDateDown($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `addDate` DESC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }

    public function getProductsPriceUp($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `price` ASC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }

    public function getProductsPriceDown($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `price` DESC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }

    public function getProductsUU($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `price` ASC, `addDate` ASC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }

    public function getProductsDD($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `price` DESC, `addDate` DESC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }

    public function getProductsUD($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `price` ASC, `addDate` DESC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }


    public function getProductsDU($startFrom,$limit):array
    {

        $statement = $this->dbconnection->getConnection()->prepare(
            "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` WHERE 1
            ORDER BY `price` DESC, `addDate` ASC LIMIT $startFrom,$limit"
        );

        $statement->execute([]);

        $results = $statement->fetchAll();

        return $results;


    }


    public function deleteProduct(string $idProduct)
   {

    $statement = $this->dbconnection->getConnection()->prepare(
        "DELETE FROM `produit` WHERE id = ?"
    );
    $affectedLines = $statement->execute([$idProduct]);

    return ($affectedLines > 0);

   }



   public function searchProduct($keyword,$startFrom,$limit){

    $statement = $this->dbconnection->getConnection()->prepare(
        "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` FROM `produit` 
        WHERE `name` LIKE CONCAT('%',?,'%');
        ORDER BY `name` LIMIT $startFrom,$limit"
    );

    $statement->execute([$keyword]);

    $results = $statement->fetchAll();

    return $results;


   }

   

   public function addProducts($products){

    $addedLines = 0;

    foreach($products as $product){

        $statement = $this->dbconnection->getConnection()->prepare(
            "INSERT INTO `produit`(`name`, `price`, `quantity`, `pic`, `addDate`) 
            VALUES (?,?,?,?,NOW())"
        );
    
        $affectedLines  = $statement->execute([$product->name,$product->price,$product->quantity,
        $product->pic]);

        if($affectedLines==0){
            
            throw new Exception("Une erreur est survenue lors de l'ajout d'un produit!!");

        }else{

            $addedLines+=1;

        }

    }

    return($addedLines==count($products));

   }


   public function getProduct($idProduct)
   {

    $statement = $this->dbconnection->getConnection()->prepare(
        "SELECT `id`, `name`, `price`, `quantity`, `pic`, `addDate` 
        FROM `produit` 
        WHERE `id`=?"
    );

    $statement->execute([$idProduct]);

    $product = $statement->fetch();

    return $product;

   }




   public function modifyProduct($product){

        $statement = $this->dbconnection->getConnection()->prepare(
            "UPDATE `produit` 
            SET `name`=?,`price`=?,`quantity`=?,`pic`=? 
            WHERE id=?"
        );
    
        $affectedLines  = $statement->execute([$product->name,$product->price,$product->quantity,
        $product->pic,$product->id]);

        if($affectedLines==0){
            
            throw new Exception("une erreur est survenue lors de l'ajout d'un produit!!");

        }

        return($affectedLines==1);

   }



   public function modifyProductNoPic($product){

    $statement = $this->dbconnection->getConnection()->prepare(
        "UPDATE `produit` 
        SET `name`=?,`price`=?,`quantity`=?
        WHERE id=?"
    );

    $affectedLines  = $statement->execute([$product->name,$product->price,$product->quantity,
    $product->id]);

    if($affectedLines==0){
        
        throw new Exception("une erreur est survenue lors de l'ajout d'un produit!!");

    }

    return($affectedLines==1);

}


   public function getStatistics(){

    $statement = $this->dbconnection->getConnection()->prepare(
        "SELECT COUNT(`id`) as totalProducts, MIN(`price`) as minPrice, 
        MAX(`price`) as maxPrice 
        FROM `produit`"
    );

    $statement->execute([]);

    $stats = $statement->fetch();

    return $stats;

   }

}
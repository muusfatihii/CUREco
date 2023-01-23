<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    

    <link rel="stylesheet" href="css/style.css">
    <title>Cure CO</title>
</head>

<body>





<nav class="navbar navbar-expand-md bg-dark bg-transparent navbar-dark fixed-top" id="mynav">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold" href="#">
            <span class="bg-dark px-2 py-1 rounded-3 text-light">Cure</span>
            <span class="text-dark">.Co</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="collapse navbar-collapse justify-content-end fw-bold" id="navbarNav" style="list-style: none;">
            <li class="nav-item active">
                <a class="nav-link text-dark" href="#">Home</a>
            </li>
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin']==1):?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="page/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="page/signup">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="auth/logout">Log out</a>
            </li>
            <?php else:?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="page/signin">Sign In</a>
            </li>
            <?php endif;?>
        </ul>
  </div>
</nav>



<?php

include_once('../app/views/footer.php');

?>

<!--bootstrap JS Import-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>







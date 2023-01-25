<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/style.css">
    <title>Cure CO</title>
</head>

<body>
    
<header class=" w-full">

<nav class="flex fixed top-0 justify-between p-2 z-30 w-full bg-blue px-4 transition easy-linear">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bar w-8 h-8 text-white my-auto md:hidden cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <p class="text-white font-bold text- my-auto">Cure<span class="text-sm text-blue-600">.co</span></p>
            <ul class="navUl flex justify-between text-lg font-bold text-white max-md:flex-col max-md:absolute max-md:w-full max-md:left-0 max-md:bg-black max-md:hidden relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="navx w-8 h-8 text-white my-auto md:hidden cursor-pointer absolute">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
    
                <li class="border-b-white mx-4 border-b hover:border-b-2 w-fit max-md:mx-auto max-md:my-2"><a href="#">Home</a></li>
                
                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']==1): ?>
                <li class="border-b-white mx-4 border-b  hover:border-b-2 w-fit max-md:mx-auto max-md:my-2"><a href="/projet/public/page/dashboard">Dashboard</a></li>
                <li class="border-b-white mx-4 border-b  hover:border-b-2 w-fit max-md:mx-auto max-md:my-2"><a href="/projet/public/page/signup">Sign Up</a></li>
                
                <a href="/projet/public/auth/logout" class="border border-white flex px-4 py-1 text-lg rounded-md font-medium text-white hover:text-black hover:bg-white transition easy-linear"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 my-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
                <span class="max-sm:hidden">Logout</span>
               </a>
                <?php else:?>
                    <a href="/projet/public/page/signin" class="border border-white flex px-4 py-1 text-lg rounded-md font-medium text-white hover:text-black hover:bg-white transition easy-linear"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 my-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
              </svg>
              <span class="max-sm:hidden">Login</span>
               </a>
               <?php endif;?>
            </ul>
</nav>
</header>



<script>
    var bar = document.querySelector('.bar');
    var x=document.querySelector('.navx');
    var nav = document.querySelector('.navUl');
    bar.addEventListener('click',e=>{
        nav.classList.remove('max-md:hidden');
    })
    x.addEventListener('click',e=>{
        nav.classList.add('max-md:hidden');
    });
</script>



<section>
    <div class="imgBack">
    </div>
</section>

<style>

.imgBack{
   background-image: url("/projet/public/img/imgBack.jpg");
   width: 100vw;
   height: 100vh;
   background-position: center;
   background-size: cover;
   position: relative;
}

.imgBack__title{
    position: absolute;
    bottom: 6%;
    left: 8%;
    line-height: 35px;
    font-size: 25px;
    color: white;
}

.imgBack__title span{
    color:#FEB862;
}

.imgBack__title span a{
    text-decoration: none;
    color: #FEB862;
}
</style>



<?php

include_once('../app/views/footer.php');

?>

</body>
</html>







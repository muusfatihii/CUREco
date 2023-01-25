<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="css/style.css">
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="/projet/public/js/picverification.js"></script>

    <title>Cure CO--DashBoard</title>

</head>

<body style="position: relative;" id="up">

<header class=" w-full">

<nav class="flex top-0 justify-between p-2 z-30 w-full bg-black px-4 transition easy-linear">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bar w-8 h-8 text-white my-auto md:hidden cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <p class="text-white font-bold text- my-auto">Cure<span class="text-sm text-blue-600">.co</span></p>
            <ul class="navUl flex justify-between text-lg font-bold text-white max-md:flex-col max-md:absolute max-md:w-full max-md:left-0 max-md:bg-black max-md:hidden relative">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="navx w-8 h-8 text-white my-auto md:hidden cursor-pointer absolute">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
    
                <li class="border-b-white mx-4 border-b  hover:border-b-2 w-fit max-md:mx-auto max-md:my-2"><a href="/projet/public/">Home</a></li>
                
                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']==1): ?>
                <li class="border-b-white mx-4 border-b  hover:border-b-2 w-fit max-md:mx-auto max-md:my-2"><a href="#">Dashboard</a></li>
                <li class="border-b-white mx-4 border-b  hover:border-b-2 w-fit max-md:mx-auto max-md:my-2"><a href="/projet/public/page/signup">Sign Up</a></li>
                
                <a href="/projet/public/auth/logout" class="border border-white flex px-4 py-1 text-lg rounded-md font-medium text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 my-auto">
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




<!-- add Products section -->


<h3 id="addingProductOpt" style="cursor:pointer;color:blue;padding:20px;display:flex;
justify-content:space-between;align-items:center;padding-left:40px;padding-right:40px;">
    <strong>Ajout des produits :</strong>
    <i id="addnotdisplayed" class="bi bi-arrow-right"></i>
    <i id="adddisplayed" class="bi bi-arrow-down"></i>
</h3>

<section id="addProductSection">

<div class="flex items-center justify-center h-[500] bg-blue-500">

 <form id="productsToAdd" method="POST" enctype="multipart/form-data" class="my-20">

    <div id="productsContainer">

        <div class="bg-white w-96 p-6 rounded shadow-sm" id="product1">

            <label class="text-blue-400">Nom de Produit :</label>
            <input
            type="text" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="productName1" 
            name="productName1" 
            required
            >

            <label class="text-blue-400">Photo de produit :</label>

            <input 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="picProduct1" 
            type="file" 
            accept="image/png, image/gif, image/jpeg"
            name="picProduct1"
            required
            >

            <label class="text-blue-400">Quantité :</label>

            <input 
            min=0
            type="number" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="qtyProduct1" 
            name="qtyProduct1" 
            required>

            <label class="text-blue-400">prix :</label>

            <input 
            min=0
            type="number" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="priceProduct1" 
            name="priceProduct1" 
            required>

        </div>

    </div>

    <div class="bg-white w-96 p-6 rounded shadow-sm">

        <button type="button" 
        class="bg-blue-500 w-full text-gray-100 py-2 mb-4 rounded hover:bg-blue-700 transition-colors" 
        id="addOtherProductBtn">+</button>

        <button type="button" 
        class="bg-blue-500 w-full text-gray-100 py-2 mb-4 rounded hover:bg-blue-700 transition-colors" 
        id="deleteProductBtn">-</button>

        <button
        type="submit"
        id="addProductsbmt"
        class="bg-blue-500 w-full text-gray-100 py-2 mb-4 rounded hover:bg-blue-700 transition-colors"
        >Ajouter</button>
    </div>
 </form>
</div>
</section>

<script>
var limit=2;
var page=1;




//add Product section

    $("#addProductSection").hide();
    $("#addingProductOpt").find('#adddisplayed').hide();
    var hidden=1;

    $("#addingProductOpt").click(function(){

       if(hidden==1){
        
        $("#addProductSection").show();

        $("#addingProductOpt").find('#adddisplayed').show();
        $("#addingProductOpt").find('#addnotdisplayed').hide();

        hidden=0;

       }else{
       
        $("#addProductSection").hide();

        $("#addingProductOpt").find('#adddisplayed').hide();
        $("#addingProductOpt").find('#addnotdisplayed').show();

        hidden=1;

       }
        
    })
    //end Product add section
var j=2;
// window.onload = function (){

product = document.getElementById('product1');
addOtherProductBtn = document.getElementById('addOtherProductBtn');
deleteProductBtn = document.getElementById('deleteProductBtn');
productsContainer = document.getElementById('productsContainer');



addOtherProductBtn.addEventListener('click',function(){

    $clonedProduct = $('#product1').clone().appendTo('#productsContainer');
    $clonedProduct.attr('id','product'+j);

    $clonedProduct.find('#productName1')
    $clonedProduct.find('#picProduct1')
    $clonedProduct.find('#qtyProduct1')
    $clonedProduct.find('#priceProduct1')

    $clonedProduct.find('#productName1').attr('id','productName'+j).attr('name','productName'+j);
    $clonedProduct.find('#picProduct1').attr('id','picProduct'+j).attr('name','picProduct'+j);
    $clonedProduct.find('#qtyProduct1').attr('id','qtyProduct'+j).attr('name','qtyProduct'+j);
    $clonedProduct.find('#priceProduct1').attr('id','priceProduct'+j).attr('name','priceProduct'+j);

    $clonedProduct.find('#productName'+j).val('');
    $clonedProduct.find('#picProduct'+j).val('');
    $clonedProduct.find('#qtyProduct'+j).val('');
    $clonedProduct.find('#priceProduct'+j).val('');
    j++;

})


deleteProductBtn.addEventListener('click',function(){

    if(j>2){

        productsContainer.removeChild(productsContainer.lastElementChild);
        j--;
    }

})

// }

function removeInputs(){

    productsContainer = document.getElementById('productsContainer');

    if(j>2){

    productsContainer.removeChild(productsContainer.lastElementChild);
    j--;

    }

    $('#productName1').val('');
    $('#picProduct1').val('');
    $('#qtyProduct1').val('');
    $('#priceProduct1').val('');

}

// $('form#productsToAdd').submit( function( e ) {
//     e.preventDefault();
//     form_data= new FormData($(this)[0]);
//     form_data.append("limit",limit*page);
//     form_data.append("priceOrder",priceOrder);
//     form_data.append("addDateOrder",priceOrder);

//     var imgFile = $("#picProduct1")[0]; 
//     form_data.append("picProduct1", imgFile.files[0]);
//     $.ajax({
//         url: '/projet/public/product/add',
//         type: 'POST',
//         data: form_data,
//         contentType: false,
//         cache: false,
//         processData:false,
//         success: function(data){

//                     products=JSON.parse(data);

//                     if(products.length<(page*limit)){

//                         $("#loadMoreBtn").hide();
//                         $("#noMoreProducts").show();

//                     }else{

//                         $("#loadMoreBtn").show();
//                         $("#noMoreProducts").hide();

//                     }

//                     output = ``;

//                     products.forEach(product=>{

//                         output += `<tr>`;

//                         output += `<th scope="row"><img src="/projet/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
//                         output += `<td>`+product.name+`</td>`;
//                         output += `<td>`+product.quantity+`</td>`;
//                         output += `<td>`+product.addDate+`</td>`;
//                         output += `<td>`+product.price+`</td>`;
//                         output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
//                         output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;


//                         output += `</tr>`;

                        
//                     });


//                     $('#products').html(output);

//                     $("#addProductSection").hide();

//                     removeInputs();

//                     $("#addingProductOpt").find('#adddisplayed').hide();
//                     $("#addingProductOpt").find('#addnotdisplayed').show();
//                     hidden=1;

//                     updateStats();

                    

            
//         }
//     });
    
// });

function addProduct(){

    form_data= new FormData($('form#productsToAdd')[0]);
    form_data.append("limit",limit*page);
    form_data.append("priceOrder",priceOrder);
    form_data.append("addDateOrder",priceOrder);

    var imgFile = $("#picProduct1")[0]; 
    form_data.append("picProduct1", imgFile.files[0]);
    $.ajax({
        url: '/projet/public/product/add',
        type: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){

                    products=JSON.parse(data);

                    if(products.length<(page*limit)){

                        $("#loadMoreBtn").hide();
                        $("#noMoreProducts").show();

                    }else{

                        $("#loadMoreBtn").show();
                        $("#noMoreProducts").hide();

                    }

                    output = ``;

                    products.forEach(product=>{

                        output += `<tr>`;

                        output += `<th scope="row"><img src="/projet/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
                        output += `<td>`+product.name+`</td>`;
                        output += `<td>`+product.quantity+`</td>`;
                        output += `<td>`+product.addDate+`</td>`;
                        output += `<td>`+product.price+`</td>`;
                        output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
                        output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;


                        output += `</tr>`;

                        
                    });


                    $('#products').html(output);

                    $("#addProductSection").hide();

                    removeInputs();

                    $("#addingProductOpt").find('#adddisplayed').hide();
                    $("#addingProductOpt").find('#addnotdisplayed').show();
                    hidden=1;

                    updateStats();

                    

            
        }
    });


}

</script>

<!-- end add Products section -->



<!-- stats section -->

<h3 id="statsOpt" style="cursor:pointer;color:blue;padding:20px;display:flex;
justify-content:space-between;align-items:center;padding-left:40px;padding-right:40px;">
    <strong>Statistiques :</strong>
    <i id="statsnotdisplayed" class="bi bi-arrow-right"></i>
    <i id="statsdisplayed" class="bi bi-arrow-down"></i>
</h3>

<section id="statistics">

<div class="col-span-12 mt-8 mb-8 mx-auto">
                                <div class="grid grid-cols-6 gap-10 mt-5">
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8">Total Produits : <strong id="totalProducts">0</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8">Prix maximal : <strong id="maxPrice">0</strong></div>                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                                </svg>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8">Prix minimal : <strong id="minPrice">0</strong></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
</div>

</section>

<script>

    $("#statistics").hide();
    $("#statsOpt").find('#statsdisplayed').hide();

    var statshidden=0;
    var updated = false;

    $("#statsOpt").click(function(){
            
            if(!updated){

                updateStats();
                updated=true;
            }

            if(updated){

                if(statshidden==1){

                    $("#statistics").show();

                    $("#statsOpt").find('#statsdisplayed').show();
                    $("#statsOpt").find('#statsnotdisplayed').hide();
                    
                    statshidden=0;

                }else{

                    $("#statistics").hide();

                    $("#statsOpt").find('#statsdisplayed').hide();
                    $("#statsOpt").find('#statsnotdisplayed').show();

                    statshidden=1;

                }
            }
            

    })

    function updateStats(){

    $.ajax({
    url: '/projet/public/product/stats',
    method: "GET",
    success:function(data){


                if(data!=1){

                    stats=JSON.parse(data);

                    $("#totalProducts").text(stats.totalProducts);
                    $("#minPrice").text(stats.minPrice);
                    $("#maxPrice").text(stats.maxPrice);

                }else{

                    $("#totalProducts").text(0);
                    $("#minPrice").text("--");
                    $("#maxPrice").text("--");


                }
                    
        }

    });

    }

</script>

<!-- end stats section -->




<!-- Filter section -->

<!-- <div style="margin: auto;margin-top: 60px;"> -->
      <select 
      id="priceOrdered" 
      style="outline-color: blue;border-color: blue;border-width:1px;text-align:center;" class="rounded-xl"
      required>
              <option value="none">Prix--none</option>
              <option value="up">Prix--Up</option>
              <option value="down">Prix--Down</option>
      </select>

      <select 
      id="addDateOrdered" 
      style="outline-color: blue;border-color: blue;border-width:1px;text-align:center;" class="rounded-xl"
      required>
              <option value="none">Date d'ajout--None</option>
              <option value="up">Date d'ajout--Up</option>
              <option value="down">Date d'ajout--Down</option>
      </select>

      <input 
      id="searchInput"
      placeholder="Nom de produit"
      style="outline-color: blue;border-color: blue;border-width:1px;" class="px-2 rounded-xl"
      >
      </input>
<!-- </div> -->

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"><i class="bi bi-image"></i></th>
      <th scope="col"><i class="bi bi-file"></i></th>
      <th scope="col">Qté</th>
      <th scope="col"><i class="bi bi-calendar-check"></i></th>
      <th scope="col"><i class="bi bi-coin"></i></th>
      <th scope="col"><i class="bi bi-info-circle"></i></th>
      <th scope="col"><i class="bi bi-trash3"></i></th>
    </tr>
  </thead>
  <tbody id="products">
    <?php
    $products = $data["products"];

        foreach($products as $product){
    ?>
    <tr>
        <th scope="row"><img src="/projet/public/uploads/<?=$product->pic?>" style="height:32px;width:32px;" alt=""></th>
        <td><?=$product->name?></td>
        <td
        <?php
        if($product->quantity<70):
        ?>
        style="color:red!important;"

        <?php
        endif;
        ?>
        ><?=$product->quantity?></td>
        <td><?=$product->addDate?></td>
        <td><?=$product->price?></td>
        <td><i id="<?=$product->id?>" class="modifyProduct bi bi-gear"></i></td>
        <td><i id="<?=$product->id?>" class="deleteProduct bi bi-x"></i></td>

    </tr>
    <?php
        }
    ?>
  </tbody>
</table>

<div class="flex items-center justify-center">
   <button id="loadMoreBtn" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Plus de Produits</button>
</div>

<div class="flex items-center justify-center">
       <button id="noMoreProducts" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Y'a plus de Produits</button>
</div>

<script>

    var priceOrder="none";
    var addDateOrder="none";

    $("#noMoreProducts").hide();
    
    

    //hide modify Product model

    $("#modifyProductForm").hide();

    //end hide modify Product model

    $(document).on("click",".deleteProduct",function(){

        let idProduct = $(this).attr("id");

        deleteProduct(idProduct);

    })

    $(document).on("click",".modifyProduct",function(){

        let idProduct = $(this).attr("id");

        $("#modifyProductForm").hide();
        
        getDescription(idProduct);

        $("#modifyProductForm").show();

    })


    $("#priceOrdered").change(function(){

        page=1;
        priceOrder = $("#priceOrdered").val();

        $('#products').empty();

        loadMoreProducts(limit,page,priceOrder,addDateOrder);

    });

    $("#addDateOrdered").change(function(){
        page=1;
        addDateOrder = $("#addDateOrdered").val();

        
        $('#products').empty();

        loadMoreProducts(limit,page,priceOrder,addDateOrder);

    });

    $("#loadMoreBtn").click(function(){

        page++;

        loadMoreProducts(limit,page,priceOrder,addDateOrder);

    });

    $("#searchInput").keyup(function(){

        page = 1;
        keyword = $("#searchInput").val()

        $('#products').empty();

        searchProduct(page,keyword);

    });



function deleteProduct(idProduct){

        $.ajax({
            url: '/projet/public/product/delete/'+idProduct,
            method: "POST",
            data: {
                    limit: limit*page,
                    priceOrder: priceOrder,
                    addDateOrder: addDateOrder

                },
            success:function(data){

                   products=JSON.parse(data);

                   if(products.length<limit*page)
                   {

                    $("#noMoreProducts").show();
                    $("#loadMoreBtn").hide();


                   }


                    output = ``;

                    products.forEach(product=>{

                        output += `<tr>`;

                        output += `<th scope="row"><img src="/projet/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
                        output += `<td>`+product.name+`</td>`;
                        output += `<td>`+product.quantity+`</td>`;
                        output += `<td>`+product.addDate+`</td>`;
                        output += `<td>`+product.price+`</td>`;
                        output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
                        output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;


                        output += `</tr>`;

                        
                    });


                    $('#products').html(output);

                    updateStats();

            },

        });

}



function loadMoreProducts(limit,page,priceOrder,addDateOrder){


            $.ajax({
                url: '/projet/public/product/show',
                method: "POST",
                data: {
                        limit: limit,
                        page: page,
                        priceOrder: priceOrder,
                        addDateOrder: addDateOrder

                    },
                success:function(data){

                    products=JSON.parse(data);

                    if(products.length<limit){

                        $("#loadMoreBtn").hide();
                        $("#noMoreProducts").show();

                    }else{

                        $("#loadMoreBtn").show();
                        $("#noMoreProducts").hide();

                    }
                    

                        output = ``;

                        products.forEach(product=>{

                            output += `<tr>`;

                            output += `<th scope="row"><img src="/projet/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
                            output += `<td>`+product.name+`</td>`;
                            output += `<td>`+product.quantity+`</td>`;
                            output += `<td>`+product.addDate+`</td>`;
                            output += `<td>`+product.price+`</td>`;
                            output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
                            output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;


                            output += `</tr>`;

                            
                        });


                        $('#products').append(output);

                },
                
            });

}


function searchProduct(page,keyword){

    $("#loadMoreBtn").hide();
    $("#noMoreProducts").hide();

$.ajax({
    url: '/projet/public/product/search',
    method: "POST",
    data: {
            limit: limit,
            page: page,
            keyword: keyword

        },
    success:function(data){

        products=JSON.parse(data);

        if(products.length==0){

            $("#noMoreProducts").show();

        }
        

            output = ``;

            products.forEach(product=>{

                output += `<tr>`;

                output += `<th scope="row"><img src="/projet/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
                output += `<td>`+product.name+`</td>`;
                output += `<td>`+product.quantity+`</td>`;
                output += `<td>`+product.addDate+`</td>`;
                output += `<td>`+product.price+`</td>`;
                output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
                output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;

                output += `</tr>`;

                
            });


            $('#products').html(output);

    },
    
});

}


function updateProducts(){

    $("#loadMoreBtn").hide();
    $("#noMoreProducts").hide();

$.ajax({
    url: '/projet/public/product/show',
    method: "POST",
    data: {
            limit: limit*page,
            priceOrder: priceOrder,
            addDateOrder: addDateOrder,
            update:"yes"

        },
    success:function(data){

            products=JSON.parse(data);

            if(products.length<page*limit){

                $("#loadMoreBtn").hide();
                $("#noMoreProducts").show();


            }else{

                $("#loadMoreBtn").show();
                $("#noMoreProducts").hide();

            }

            output = ``;

            products.forEach(product=>{

                output += `<tr>`;

                output += `<th scope="row"><img src="/projet/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
                output += `<td>`+product.name+`</td>`;
                output += `<td>`+product.quantity+`</td>`;
                output += `<td>`+product.addDate+`</td>`;
                output += `<td>`+product.price+`</td>`;
                output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
                output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;


                output += `</tr>`;

                
            });


            $('#products').html(output);

            updateStats();



    },

});

}

</script>


<!-- end Filter Section -->

<!-- Update Products section -->

    <div class="flex items-center justify-center h-screen w-screen bg-blue-300 opacity-[.95]" id="modifyProductForm" style="display:none;position:absolute;top:0;left:0;">

        <form id="modifyform" class="bg-white w-96 p-6 rounded shadow-sm">
            
            <span onclick="document.getElementById('modifyProductForm').style.display='none'"
            style="display:block;cursor:pointer;" 
            class="w3-button w3-display-topright">&times;</span>

            <input
            style="display:none;"
            type="text" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="idProduct" 
            name="idProduct" 
            required
            >

            <label class="text-blue-400">Nom de Produit :</label>
            <input
            type="text" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="productName" 
            name="productName" 
            required
            >

            <label class="text-blue-400">Photo de produit :</label>

            <input 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="picProduct" 
            type="file" 
            accept="image/png, image/gif, image/jpeg"
            name="picProduct">

            <label class="text-blue-400">Quantité :</label>

            <input 
            min=0
            type="number" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="qtyProduct" 
            name="qtyProduct" 
            required>

            <label class="text-blue-400">Prix :</label>

            <input 
            min=0
            type="number" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="priceProduct" 
            name="priceProduct" 
            required>


            <label class="text-blue-400">Date d'ajout :</label>

            <input
            disabled=true
            type="date" 
            class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4 rounded" 
            id="addDateProduct" 
            name="addDateProduct" 
            >

            <button
            type="submit"
            id="modifyProductBtn"
            class="bg-blue-500 w-full text-gray-100 py-2 mb-4 rounded hover:bg-blue-700 transition-colors" 
            >Modifier</button>

      </form>
    </div>

<script>

function getDescription(idProduct){

        $.ajax({
            url: '/projet/public/product/description',
            method: "POST",
            data: {
                idProduct: idProduct,
                },
            success:function(data){

                product=JSON.parse(data);

                $("#modifyProductForm").find('#idProduct').val(product.id);
                $("#modifyProductForm").find('#productName').val(product.name);
                $("#modifyProductForm").find('#priceProduct').val(product.price);
                $("#modifyProductForm").find('#qtyProduct').val(product.quantity);
                $("#modifyProductForm").find('#addDateProduct').val(product.addDate);

            },
            
        });

}


$('form#modifyform').submit( function( e ) {

    e.preventDefault();

    form_data= new FormData($(this)[0]);

    var imgFil = $("#picProduct")[0]; 
    form_data.append("picProduct", imgFil.files[0]);

    $.ajax({
        url: '/projet/public/product/modify',
        type: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){

            if(data!=1){

                console.log("error");

            }else{

                $("#modifyProductForm").hide();
                updateProducts();

            }

        }
    });
    
});


</script>

<a href="#up"
class="absolute right-3 bottom-4 text-white bg-gradient-to-r 
from-sky-300 via-blue-600 to-indigo-700 
hover:bg-gradient-to-br focus:ring-4 
focus:outline-none focus:ring-blue-300 
dark:focus:ring-blue-800 shadow-lg 
shadow-blue-500/50 dark:shadow-lg 
dark:shadow-blue-800/80 font-medium 
rounded-lg text-sm px-2 py-2.5 text-center 
mr-2 mb-2 ">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
</a>

<!-- end Update Products section -->

<?php

include_once('../app/views/footer.php');

?>
<!--bootstrap JS Import-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

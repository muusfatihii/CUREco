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

    <title>Cure CO--DashBoard</title>

</head>

<body style="position: relative;" id="up">

<nav class="navbar navbar-expand-md bg-dark bg-transparent navbar-dark" id="mynav">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold" href="/cureco/public/">
            <span class="text-dark text-xl">Cure</span>
            <span class="bg-dark px-1 text-xs py-1 rounded-3 text-light">.Co</span>
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
                <a class="nav-link text-dark" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="/cureco/public/page/signup">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="/cureco/public/auth/logout">Log out</a>
            </li>
            <?php else:?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="/cureco/public/page/signin">Sign In</a>
            </li>
            <?php endif;?>
        </ul>
  </div>
</nav>




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
            name="picProduct1">

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






// function getProductsInfos(){

// let k = 1;
// let nbrChildren = $("#productsContainer").children().length;

// var products = [];
// var pics = [];

// while(k <= nbrChildren){
//     product = [];
//     product.push($("#productName"+k).val());
//     product.push($("#priceProduct"+k).val());
//     product.push($("#qtyProduct"+k).val());

//     pic = new FormData();
//     pic.append('file',$("#picProduct"+k)[0].files[0]);
//     pics.push(pic);

//     products.push(product);

//     k++;

// }

// result = [];

// result.push(products);
// result.push(pics);

// return result;


// }


//     form = $("form#productsToAdd")[0];

//     form.submit(function(e){
    
//     e.preventDefault();

//     var formData = new FormData(form);

//     $.ajax({
//             url: '/cureco/public/product/add',
//             method: "POST",
//             data: {
//                     data:formData,
//                 },
//             contentType: false,
//             cache: false,
//             processData:false,
//             success:function(data){

//                 console.log(data);


//                 // if(data!=1){

//                 // products=JSON.parse(data);

//                 //     output = ``;

//                 //     products.forEach(product=>{

//                 //         output += `<tr>`;

//                 //         output += `<th scope="row"><img src="uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
//                 //         output += `<td>`+product.name+`</td>`;
//                 //         output += `<td>`+product.quantity+`</td>`;
//                 //         output += `<td>`+product.addDate+`</td>`;
//                 //         output += `<td>`+product.price+`</td>`;
//                 //         output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
//                 //         output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;

//                 //         output += `</tr>`;

                        
//                 //     });


//                 //     $('#products').html(output);

//                 // }else{

//                 //     console.log("1");


//                 // }

//             },
            
//         });

// })



// $('form#productsToAdd').on('submit', function(e) {

//     e.preventDefault();


//     var form = $('form#productsToAdd')[0];
//     var formData = new FormData(form);

//     // for (var p of formData) {
//     //   console.log(p);
//     // }


//     $.ajax({
//             url: '/cureco/public/product/add',
//             method: "POST",
//             data: {
//                     data: formData,
//                 },
//             contentType: false,
//             cache: false,
//             processData:false,
//             success:function(data){

//                 // for (var p of data) {
//                 //   console.log(p);
//                 // }

//                 alert(data);

//             }
//     });

// })





// $(document).ready(function(){
//     var form=$("form#productsToAdd");
//     $("#addProductsbmt").click(function(e){
//         e.preventDefault();
//     $.ajax({
//             type:"POST",
//             url: '/cureco/public/product/add',
//             data: $("form#productsToAdd input").serialize(),
//             success: function(response){
//                 console.log(response);  
//             }
//         });
//     });
//     });




$('form#productsToAdd').submit( function( e ) {
    e.preventDefault();
    form_data= new FormData($(this)[0]);
    form_data.append("limit",limit*page);
    form_data.append("priceOrder",priceOrder);
    form_data.append("addDateOrder",priceOrder);

    var imgFile = $("#picProduct1")[0]; 
    form_data.append("picProduct1", imgFile.files[0]);
    $.ajax({
        url: '/cureco/public/product/add',
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

                        output += `<th scope="row"><img src="/cureco/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
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
    
});

// var form = $('form#productsToAdd')[0];
// var formData = new FormData(this);

//  jQuery.each(jQuery('#photo-filename')[0].files, function(i, file) {
//     formData.append('file-'+i, file);
// });

// formData.append('picProduct', $('form#productsToAdd')[0].files[0]);

// $.ajax({
//   url: "/cureco/public/product/add", 
//   data: formData,
//   type: "POST", 
//   contentType: false,       
//   cache: false,             
//   processData: false
// });

//     console.log(formData);
// });



// function addProducts(page,limit,priceOrder,addDateOrder,formData){

//         $.ajax({
//             url: '/cureco/public/product/add',
//             method: "POST",
//             data: {
//                     data:formData,
//                     limit: limit*page,
//                     priceOrder: priceOrder,
//                     addDateOrder: addDateOrder

//                 },
//             success:function(data){

//                 if(data!=1){

//                 products=JSON.parse(data);

//                     output = ``;

//                     products.forEach(product=>{

//                         output += `<tr>`;

//                         output += `<th scope="row"><img src="uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
//                         output += `<td>`+product.name+`</td>`;
//                         output += `<td>`+product.quantity+`</td>`;
//                         output += `<td>`+product.addDate+`</td>`;
//                         output += `<td>`+product.price+`</td>`;
//                         output += `<td><i id="`+product.id+`" class="modifyProduct bi bi-gear"></i></td>`;
//                         output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;

//                         output += `</tr>`;

                        
//                     });


//                     $('#products').html(output);

//                 }else{

//                     console.log("1");


//                 }

//             },
            
//         });

// }
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


<div class="row">
        
        <div class="card col-xs-12 col-sm-8 col-md-5 col-lg-4 item">
            <img src="/cureco/public/img/maxPrice.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Prix minimal : <strong id="minPrice">0</strong></h5>
            </div>
        </div>
        <div class="card col-xs-12 col-sm-8 col-md-5 col-lg-4 item">
            <img src="/cureco/public/img/maxPrice.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Prix maximal : <strong id="maxPrice">0</strong></h5>
            </div>
        </div>
        <div class="card col-xs-12 col-sm-8 col-md-5 col-lg-4 item">
            <img src="/cureco/public/img/totalProducts.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Prix maximal : <strong id="totalProducts">0</strong></h5>
            </div>
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
    url: '/cureco/public/product/stats',
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

<div style="margin: auto;margin-top: 60px;">
      <select 
      id="priceOrdered" 
      style="outline-color: blue;border-color: blue;border-width:1px;text-align:center" class="rounded-xl"
      required>
              <option value="none">------</option>
              <option value="up">Prix--Ascendant</option>
              <option value="down">Prix--Descendant</option>
      </select>

      <select 
      id="addDateOrdered" 
      style="outline-color: blue;border-color: blue;border-width:1px;text-align:center;" class="rounded-xl"
      required>
              <option value="none">------</option>
              <option value="up">Date d'ajout--Ascendant</option>
              <option value="down">Date d'ajout--Descendant</option>
      </select>

      <input 
      id="searchInput"
      style="outline-color: blue;border-color: blue;border-width:1px;" class="rounded-xl"
      >
      </input>
</div>

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
        <th scope="row"><img src="/cureco/public/uploads/<?=$product->pic?>" style="height:32px;width:32px;" alt=""></th>
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

<!-- <?php if(count($products)>0):?>
<div class="flex items-center justify-center">
   <button id="loadMoreBtn" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Plus de Produits</button>
</div>
<div class="flex items-center justify-center">
   <button type="button" class="hidden text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Y'a plus de Produits</button>
</div>
<?php else:?>
    <div class="flex items-center justify-center">
       <button id="loadMoreBtn" type="button" class="hidden text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Plus de Produits</button>
    </div>
    <div class="flex items-center justify-center">
       <button id="noMoreProducts" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">Y'a plus de Produits</button>
    </div>

<?php endif;?> -->



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
        $("#loadMoreBtn").show();

        page=1;
        priceOrder = $("#priceOrdered").val();

        $('#products').empty();

        loadMoreProducts(limit,page,priceOrder,addDateOrder);

    });

    $("#addDateOrdered").change(function(){
        $("#loadMoreBtn").show();
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
        $("#loadMoreBtn").show();

        page = 1;
        keyword = $("#searchInput").val()

        $('#products').empty();

        searchProduct(page,keyword);

    });



function deleteProduct(idProduct){

        $.ajax({
            url: '/cureco/public/product/delete/'+idProduct,
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

                        output += `<th scope="row"><img src="/cureco/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
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
                url: '/cureco/public/product/show',
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

                    }
                    

                        output = ``;

                        products.forEach(product=>{

                            output += `<tr>`;

                            output += `<th scope="row"><img src="/cureco/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
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
    url: '/cureco/public/product/search',
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

                output += `<th scope="row"><img src="/cureco/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
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

$.ajax({
    url: '/cureco/public/product/show',
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

                output += `<th scope="row"><img src="/cureco/public/uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
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

        <div class="bg-white w-96 p-6 rounded shadow-sm">
            
            <span onclick="document.getElementById('modifyProductForm').style.display='none'"
            style="display:block;cursor:pointer;" 
            class="w3-button w3-display-topright">&times;</span>

            <input
            style="display:none;"
            disabled=true
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
            id="modifyProductBtn"
            onclick="modifyProduct();"
            class="bg-blue-500 w-full text-gray-100 py-2 mb-4 rounded hover:bg-blue-700 transition-colors" 
            >Modifier</button>

        </div>
    </div>

<script>

function getDescription(idProduct){

        $.ajax({
            url: '/cureco/public/product/description',
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




function modifyProduct(){

        idProduct = $("#modifyProductForm").find('#idProduct').val();
        productName = $("#modifyProductForm").find('#productName').val();
        priceProduct = $("#modifyProductForm").find('#priceProduct').val();
        qtyProduct = $("#modifyProductForm").find('#qtyProduct').val();



        $.ajax({
            url: '/cureco/public/product/modify',
            method: "POST",
            data: {
                idProduct: idProduct,
                productName: productName,
                priceProduct: priceProduct,
                qtyProduct: qtyProduct
                },
            success:function(data){

                if(data!=1){

                    console.log("error");

                }else{

                    $("#modifyProductForm").hide();

                    updateProducts();


                }

            },
            
        });
}


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

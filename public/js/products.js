window.onload = function (){

    alert(1);
    

}

    

    


function deleteProduct(idProduct){


    $.ajax({
        url: '/cureco/public/product/delete/'+idProduct,
        method: "GET",
        success:function(data){

            console.log(data)

            products=JSON.parse(data);

                output = ``;

                products.forEach(product=>{

                    output += `<tr>`;

                    output += `<th scope="row"><img src="uploads/`+product.pic+`" style="height:32px;width:32px;" alt=""></th>`;
                    output += `<td>`+product.name+`</td>`;
                    output += `<td>`+product.quantity+`</td>`;
                    output += `<td>`+product.addDate+`</td>`;
                    output += `<td>`+product.price+`</td>`;
                    output += `<td><i id="`+product.id+`" class="bi bi-gear"></i></td>`;
                    output += `<td><i id="`+product.id+`" class="deleteProduct bi bi-x"></i></td>`;


                    output += `</tr>`;

                    
                });


                $('#products').html(output);

        },
    });

}



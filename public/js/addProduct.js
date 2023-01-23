window.onload = function (){

    product = document.getElementById('product1');
    addOtherProductBtn = document.getElementById('addOtherProductBtn');
    deleteProductBtn = document.getElementById('deleteProductBtn');
    productsContainer = document.getElementById('productsContainer');
    i=2;
    
    
    addOtherProductBtn.addEventListener('click',function(){
        let clonedProduct = product.cloneNode(true);
        clonedPort.name = 'product'+i;
        productsContainer.append(clonedPort);
        i++;
    })
    
    
    deleteProductBtn.addEventListener('click',function(){
        if(i>2){
            productsContainer.removeChild(productsContainer.lastElementChild);
            i--;
        }
    })
    
    
    
    
    }
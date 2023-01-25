window.onload = function () {



$('#addProductsbmt').click(function (e) { 

    e.preventDefault();

    result = false;

    for(var i=1;i<j;i++){
        
        if(document.getElementById('picProduct'+i).value!=''){

            result = testExtension(document.getElementById('picProduct'+i));

            if(result==false){

                break;
            }

        }
        
    }

    if(result){

        addProduct();

    }

});










$('#modifyProductBtn').click(function (e) { 

    e.preventDefault();

    reslt = false;
        
    if(document.getElementById('picProduct').value!=''){

        result = testExtension(document.getElementById('picProduct'));

    }
        
    if(reslt){

        $('#modifyform').submit();

    }




});

    
  
    function testExtension(imageInput) {

      var isValid1 = /\.jpe?g$/i.test(imageInput.value);
      var isValid2 = /\.png$/i.test(imageInput.value);

            if (isValid1 || isValid2) {

                return true;

            }else{

                return false;
            }

    }

  };
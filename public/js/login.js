$(document).ready(function () {


    function validateEmail(field) {

        const regExp = /^([a-zA-Z0-9-_\.]+)@([a-zA-Z0-9]+)\.([a-zA-Z]{2,10})(\.[a-zA-Z]{2,8})?$/
        
        if (!(regExp.test($('#'+field).val()))) {

            
            $('#'+field+'_err').removeClass('hidden');
            $('#'+field+'_err').addClass('block');

            return false;

        } 

        $('#'+field+'_err').removeClass('block');
        $('#'+field+'_err').addClass('hidden');

        return true;
    }




    function checkfield(field){

       

        if($('#'+field).val()==''){

            $('#'+field+'_err').removeClass('hidden');
            $('#'+field+'_err').addClass('block');

            return false;

        }else{

            if(field==='email'){

                return validateEmail(field);
    
            }

            $('#'+field+'_err').removeClass('block');
            $('#'+field+'_err').addClass('hidden');

            return true;

        }
    }


    $('#login').click(function (e) { 

        e.preventDefault();

        if(checkfield('email') && checkfield('pass')){

            $('form').submit();
        }


    })



    
});

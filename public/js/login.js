$(document).ready(function () {

    function checkfield(field){

        if($('#'+field).val()==''){

            $('#'+field+'_err').removeClass('hidden');
            $('#'+field+'_err').addClass('block');

            return false;

        }else{

            $('#'+field+'_err').removeClass('block');
            $('#'+field+'_err').addClass('hidden');

            return true;

        }
    }


    $('#login').click(function (e) { 

        e.preventDefault();

        if(checkfield('email') && checkfield('pass')){

            $.post("/cureco/public/auth/signin",
                    {email:$("#email").val(),password:$("#pass").val()},
                    function (response) {
                        if(response==true){
                            // Swal.fire(
                            //     'Succes!',
                            //     'login avec succes!',
                            //     'success'
                            // ) 
                            alert('OKOOOOOOOOK');
                            setTimeout(()=>{
                                location.replace('/cureco/public/page/dashboard');
                            },2000);      
                        }
                        else{
                            // Swal.fire({
                            //     icon: 'error',
                            //     title: 'Oops...',
                            //     text: 'Email or password invalid !',
                            // })

                            alert('NOKOOOOOOOOK');
                        }
                    },
                );
        }
    });
});

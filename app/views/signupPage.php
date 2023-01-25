<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
    
    <title>Sign Up</title>
</head>
<body>
    <main class="flex items-center justify-center h-screen bg-blue-300">

        <form method="POST" action="/cureco/public/auth/signup" class="bg-white w-96 p-6 rounded shadow-sm">
                
                <?php if(!empty($data["em"])):?>
                    <div class="bg-red-500 px-3 py-2 rounded text-gray-100 mb-3">
                    <p><?=$data["em"]?></p>
                    </div>
                <?php endif?>

                <label class="text-red-400" for=""></label>
                <input 
                id="firstname"
                placeholder="First Name"
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4"
                name="firstname" 
                type="text" 
                />


                <label class="text-red-400" for=""></label>
                <input 
                id="lastname"
                placeholder="Last Name"
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4"
                name="lastname" 
                type="text" 
                />
                
                <label class="text-red-400" for=""></label>
                <input 
                id="email"
                placeholder="E-mail"
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4"
                name="email" 
                type="email" 
                />
                <label class="text-red-400" for=""></label>
                <input
                id="password"
                placeholder="Password" 
                class="w-full py-2 bg-gray-100 text-gray-500 px-1 outline-none mb-4" 
                name="password"
                type="password" 
                />

                <button 
                type="submit" 
                id="register"
                class="bg-blue-500 w-full text-gray-100 py-2 rounded mb-4 hover:bg-blue-700 transition-colors">
                Submit</button>

                <button 
                type="button"
                onClick="location.href='/projet/public'" 
                class="bg-blue-500 w-full text-gray-100 py-2 rounded hover:bg-blue-700 transition-colors">
                Back</button>

            
        </form>

    </main>



    <script>

window.onload = function (){


class FormValidation {

                formValues = {
                    email: "",
                    password: "",
                    firstName: "",
                    lastName: "",
                }

                formInput = {
                    email: "",
                    password: "",
                    firstName: "",
                    lastName: "",
                }

                errorValues = {
                    emailErr: "",
                    passwordErr: "",
                    firstNameErr: "",
                    lastNameErr: "",
                }



                getInputs() {
                    this.formInput.email = document.getElementById('email')
                    this.formInput.password = document.getElementById('password')
                    this.formInput.firstName = document.getElementById('firstname')
                    this.formInput.lastName = document.getElementById('lastname')
                }

                getInputsValue() {
                    this.formValues.email = document.getElementById('email').value.trim()
                    this.formValues.password = document.getElementById('password').value.trim()
                    this.formValues.firstName = document.getElementById('firstname').value.trim()
                    this.formValues.lastName = document.getElementById('lastname').value.trim()
                }

                validateEmail() {

                    let success = false;
                    
                    const regExp = /^([a-zA-Z0-9-_\.]+)@([a-zA-Z0-9]+)\.([a-zA-Z]{2,10})(\.[a-zA-Z]{2,8})?$/
                    if (this.formValues.email === "") {

                        this.errorValues.emailErr = "Email ne peut pas etre vide"
                        this.showErrorMsg(2, this.errorValues.emailErr)

                    } else if (!(regExp.test(this.formValues.email))) {

                        this.errorValues.emailErr = "Inserez un email valide"
                        this.showErrorMsg(2, this.errorValues.emailErr)

                    } else {

                        this.errorValues.emailErr = "OK"
                        this.showErrorMsg(2, this.errorValues.emailErr)

                        success = true;

                    }


                    return success;

                    
                }

                validatePassword() {

                    let success = false;

                    if (this.formValues.password === "") {

                        this.errorValues.passwordErr = "Password ne peut pas etre vide"
                        this.showErrorMsg(3, this.errorValues.passwordErr)

                    } else if (this.formValues.password.length <= 4) {

                        this.errorValues.passwordErr = "Mot de passe faible"
                        this.showErrorMsg(3, this.errorValues.passwordErr)

                    } else if (this.formValues.password.length > 10) {

                        this.errorValues.passwordErr = "Mot de passe très longue"
                        this.showErrorMsg(3, this.errorValues.passwordErr)

                    } else {

                        this.errorValues.passwordErr = "OK"
                        
                        this.showErrorMsg(3, this.errorValues.passwordErr)

                        success = true;
                    }

                    return success;
                }


                validateFirstName() {

                    let success = false;

                    if (this.formValues.firstName === "") {

                        this.errorValues.firstNameErr = "Inserez un prenom"
                        this.showErrorMsg(0, this.errorValues.firstNameErr)

                    }else if (this.formValues.firstName.length <= 4) {

                        this.errorValues.firstNameErr = "Prenom!!"
                        this.showErrorMsg(0, this.errorValues.firstNameErr)

                    } else if (this.formValues.firstName.length > 10) {

                        this.errorValues.firstNameErr = "Oh trop de caracteres!!"
                        this.showErrorMsg(0, this.errorValues.firstNameErr)

                    } else {

                        this.errorValues.firstNameErr = "OK"

                        this.showErrorMsg(0, this.errorValues.firstNameErr)


                        success = true;

                        
                    }

                        return success;

                    }

                    validateLastName() {

                        let success = false;

                        if (this.formValues.lastName === "") {

                            this.errorValues.lastNameErr = "Inserez un nom"
                            this.showErrorMsg(1, this.errorValues.lastNameErr)

                        }else if (this.formValues.lastName.length <= 4) {

                            this.errorValues.lastNameErr = "Nom"
                            this.showErrorMsg(1, this.errorValues.lastNameErr)

                        } else if (this.formValues.lastName.length > 10) {

                            this.errorValues.lastNameErr = "Oh trop de caracteres!!"
                            this.showErrorMsg(1, this.errorValues.lastNameErr)

                        } else {

                            this.errorValues.lastNameErr = "OK"
                            this.showErrorMsg(1, this.errorValues.lastNameErr)
                            
                            success = true;
                        }

                        return success;

                    }

                    showErrorMsg(index, msg) {
                        const label = document.getElementsByTagName('label')[index]
                        label.textContent = msg
                    }

                    showSuccessMsg(index) {
                        const label = document.getElementsByTagName('label')[index]
                        label.textContent = "OK"
                    }

}




const ValidateUserInputs = new FormValidation();

ValidateUserInputs.getInputs();


$(ValidateUserInputs.formInput.email).on("change keyup paste", function(){
    ValidateUserInputs.getInputsValue();
    success_email = ValidateUserInputs.validateEmail();
})

$(ValidateUserInputs.formInput.password).on("change keyup paste", function(){
    ValidateUserInputs.getInputsValue();
    success_password = ValidateUserInputs.validatePassword();
})

$(ValidateUserInputs.formInput.firstName).on("change keyup paste", function(){
    ValidateUserInputs.getInputsValue();
    success_firstName = ValidateUserInputs.validateFirstName();
})

$(ValidateUserInputs.formInput.lastName).on("change keyup paste", function(){
    ValidateUserInputs.getInputsValue();
    success_lastName = ValidateUserInputs.validateLastName();
})

$('#register').click(function (e) { 

        e.preventDefault()



        ValidateUserInputs.getInputsValue()

        success_firstName = ValidateUserInputs.validateFirstName()

        success_lastName = ValidateUserInputs.validateLastName()
        success_email = ValidateUserInputs.validateEmail()
        success_password = ValidateUserInputs.validatePassword()

        if(success_email && success_password && success_firstName && success_lastName){


            $("form").submit();

        }

});

}
    </script>
    
</body>
</html>

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
        this.formInput.password = document.getElementById('firstname')
        this.formInput.password = document.getElementById('lastname')
    }

    getInputsValue() {
        this.formValues.email = document.getElementById('email').value.trim()
        this.formValues.password = document.getElementById('password').value.trim()
        this.formValues.password = document.getElementById('firstname').value.trim()
        this.formValues.password = document.getElementById('lastname').value.trim()
    }

    validateEmail() {
        //abc@gmail.co.in
        const regExp = /^([a-zA-Z0-9-_\.]+)@([a-zA-Z0-9]+)\.([a-zA-Z]{2,10})(\.[a-zA-Z]{2,8})?$/
        if (this.formValues.email === "") {

            this.errorValues.emailErr = "Email!!"
            this.showErrorMsg(0, this.errorValues.emailErr)

        } else if (!(regExp.test(this.formValues.email))) {

            this.errorValues.emailErr = "Invalid Email"
            this.showErrorMsg(0, this.errorValues.emailErr)

        } else {

            showSuccessMsg(0);

        }

        return true;
    }

    validatePassword() {

        if (this.formValues.password === "") {

            this.errorValues.passwordErr = "Password!!"
            this.showErrorMsg(1, this.errorValues.passwordErr)

        } else if (this.formValues.password.length <= 4) {

            this.errorValues.passwordErr = "le password doit etre plus que de  5"
            this.showErrorMsg(1, this.errorValues.passwordErr)

        } else if (this.formValues.password.length > 10) {

            this.errorValues.passwordErr = "le password doit etre moins de  10"
            this.showErrorMsg(1, this.errorValues.passwordErr)

        } else {

            showSuccessMsg(1);
            

            return true;
        }
    }


    validateFirstName() {

        if (this.formValues.firstName === "") {

            this.errorValues.firstNameErr = "veuillez inserer le prenom!!"
            this.showErrorMsg(2, this.errorValues.firstNameErr)

        }else if (this.formValues.firstName.length <= 4) {

            this.errorValues.firstNameErr = "le prenom doit etre superieur à 5"
            this.showErrorMsg(2, this.errorValues.firstNameErr)

        } else if (this.formValues.lastName.length > 10) {

            this.errorValues.firstNameErr = "le prenom doit etre moins que 10"
            this.showErrorMsg(2, this.errorValues.firstNameErr)

        } else {

            showSuccessMsg(2);
            

            return true;
        }

    }

    validateLastName() {

        if (this.formValues.lastName === "") {

            this.errorValues.lastNameErr = "veuillez inserer le prenom!!"
            this.showErrorMsg(3, this.errorValues.lastNameErr)

        }else if (this.formValues.lastName.length <= 4) {

            this.errorValues.lastNameErr = "nom min 5"
            this.showErrorMsg(3, this.errorValues.lastNameErr)

        } else if (this.formValues.lastName.length > 10) {

            this.errorValues.lastNameErr = "nom max 10"
            this.showErrorMsg(3, this.errorValues.lastNameErr)

        } else {

            showSuccessMsg(3);
            
            
            return true;
        }

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

const ValidateUserInputs = new FormValidation()

ValidateUserInputs.getInputs()


$('form').on('submit', event => {

    event.preventDefault()
    ValidateUserInputs.getInputsValue()
    ValidateUserInputs.validateFirstName()
    ValidateUserInputs.validateLastName()
    ValidateUserInputs.validateEmail()
    ValidateUserInputs.validatePassword()
    ValidateUserInputs.alertMessage()

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
        success_firstName = ValidateUserInputs.validatefirstName();
    })

    $(ValidateUserInputs.formInput.lastName).on("change keyup paste", function(){
        ValidateUserInputs.getInputsValue();
        success_lastName = ValidateUserInputs.validatelastName();
    })


    if(success_email && success_password && success_firstName && success_lastName){

        document.getElementsByTagName('form').submit();

    }
})

}

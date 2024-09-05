function passwordVisible(icon){
    let passwordInput = document.getElementById("password");

    if(passwordInput.type === "password"){

    passwordInput.type = "text";
    icon.innerHTML = '<i class="fas fa-eye"></i>';
    } else{
        passwordInput.type = "password";
        icon.innerHTML = '<i class="fas fa-eye-slash"></i>';

    }

}

function passwordConfirmVisible(icon){
    let passwordInput2 = document.getElementById("password_confirm")
    if(passwordInput2.type === "password"){
        passwordInput2.type = "text";
        icon.innerHTML = '<i class="fas fa-eye"></i>';

    } else{
        passwordInput2.type = "password"
        icon.innerHTML = '<i class="fas fa-eye-slash"></i>';

    }
}

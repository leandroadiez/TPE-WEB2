function iniciarpagina(){
    "use strict";

    let arreglocaptchas = new Array("JX87GJ5D","HUJ75G9K5","FGT60LMA","W47H9KV4","245B8JD4","1S4F6G8J","000GHJ76","JIKO8907","HU7F45G6","GG7J890P");
    let n;
    let codigo;

    function generarcaptcha(){
        n = Math.floor(Math.random() * arreglocaptchas.length); 
        codigo = arreglocaptchas[n];
        document.querySelector("#textocaptcha").innerHTML = codigo;
    }

    function validarcaptcha() {
        let captchaingresado = document.getElementById("captchaIng").value;
        if (captchaingresado == codigo) {
            if ((inputnombre.value!="")&&(inputApellido.value!="")&&(inputEmail.value!="")&&( inputCiudad.value!="")&&(inputEdad.value!="")){
                alert("Captcha correcto. Gracias por visitarnos");
                document.querySelector("#formulario").onsubmit();
            }
            else{
                alert("Debe completar todos los campos");
            }
        }
        else{
            alert("Captcha inválido. Intente de nuevo");
        }
    }

    document.querySelector("#generarcaptcha").addEventListener("click", generarcaptcha);
    document.querySelector("#formulario").addEventListener("click", validarcaptcha);
}
document.addEventListener("DOMContentLoaded", iniciarpagina);
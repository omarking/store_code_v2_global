function validar(){
    var correoL, contraL,expresionL;    
    correoL = document.getElementById("inputEmailv").value;
    contraL = document.getElementById("inputPasswordv").value;
    expresionL = /\w+@\w+\.+[a-z]/;//expresion de fomato de correo electronico

    if(contraL === ""){
        alert("¡Campo contraseña vacío!");
        return false;
    }else if(contraL.length>16){//Validacion tamaños Contraseña
        alert("¡La contraseña no debe ser mayor a 16 caracteres!");
        return false;
    }else if(contraL.length <= 6){//Validacion tamaños Contraseña
        alert("¡La contraseña debe tener al menos 7 caracteres!");
        return false;    
    }else if(correoL === ""){//Validacion vacio Email
        alert("¡El campo email esta vacío!");
        return false;
    }else if(correoL.length>245){//Validacion tamaños Email
        alert("¡Email no valido!");
        return false;
    }else if(correoL.length <= 7){//Validacion tamaños Email
        alert("¡Email no valido!");
        return false;
    }else if(!expresionL.test(correL)){//Validacion formato Email
        alert("¡Formato de email no valido!");
        return false;
    }
        
}


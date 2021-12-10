function validarAltaUsuario(){
    var nombre, apellido, contra, confirmContra,correo,email;
    nombre = document.getElementById("inputNombre").value;
    apellido = document.getElementById("inputApell").value;        
    contra = document.getElementById("inputPassword").value;
    confirmContra = document.getElementById("inputPasswordC").value;   
    
            //Email Expresion Regular
            email = document.getElementById("inputEmail4").value;
            var expresionVER= /^[A-Za-z0-9]+\.*-*_*[A-Za-z0-9]*[^\.?¡!"*#$%&/()=¿<>';:{},´+~]+@+[a-z]+\.+[a-z]+$/;
            var validacionVER = expresionVER.test(email);
    
    
    //NOMBRE EXPRESION REgULAR 
    var expresionNom= /^[a-z]+[\t\r\n\f]*[a-z]*$/i;
    var validacionNom = expresionNom.test(nombre);
    //APELLIDO EXPRESION REgULAR 
    var expresionApe1= /^[a-z]+[\t\r\n\f]*[a-z]*$/i;
    var validacionApe1 = expresionApe1.test(apellido);    
    

    correo = document.getElementById("inputEmail4").value;
        var buscador= 0;
        for(i=1;i<=correo.length;i++){
            if(correo.charAt(i-1)=="[" || correo.charAt(i-1)=="]"){
                buscador++
            }
        }

        if (nombre === "" || apellido === "" || contra === "" || confirmContra === "" ||correo === "" ){    
            if(validacionNom == false){
                if(validacionApe1 == false){
                    if(correo === ""){
                        if(buscador>=1){ //Validacion correo con For
                            if(validacionVER == false){      //Validacon email expresion regular          
                                if(confirmContra ===""){
                                    if(nombre.length>200){
                                        if(nombre.length <= 2){
                                            if(apellido.length<=3){//Validacion Apellido
                                                if(apellido.length>150){//Validacion Apellido
                                                    if(corre.length>245){//Validacion tamaños Email
                                                        if(corre.length <= 7){//Validacion tamaños Email
                                                            if(contra === ""){
                                                                if(confirmContra ===""){
                                                                    if(contra.length > 16){//Validacion tamaños Contraseña
                                                                        if(contra.length <= 7){//Validacion tamaños Contraseña
                                                                            if(contra != confirmContra){
                                                                                alert("Las contraseñas no coinciden!!!");            
                                                                                window.location.href=="../vistasCRUDRegistro/vistaAltaUsuario.php";                                     
                                                                                return false;                        
                                                                            } 
                                                                            alert("¡La contraseña debe tener al menos 8 caracteres!");
                                                                            window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                                            return false;
                                                                        }
                                                                        alert("¡La contraseña no debe ser mayor a 16 caracteres!");
                                                                        window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                                        return false;
                                                                    }
                                                                    alert("¡Confirme contraseña¡");        
                                                                    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                                    return false;
                                                                }
                                                                alert("¡Campo contraseña vacío!");
                                                                window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                                return false;
                                                            } 
                                                            alert("¡Email no valido!");
                                                            window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                            return false;
                                                        }
                                                        alert("¡Email no valido!");
                                                        window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                        return false;
                                                    }
                                                    alert("¡Apellido no valido!");
                                                    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                    return false;
                                                }
                                                alert("¡Apellido no valido!");
                                                window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                                return false;
                                            }
                                            alert("¡Nombre demaciado pequeño!");
                                            window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                            return false;
                                        }
                                        alert("¡Nombre demaciado largo!");
                                        window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                        return false;
                                    }
                                    alert("¡Confirme contraseña¡");        
                                    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                    return false;
                                }
                                
                                alert("Fomato de correo no valido2");
                                window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                                return false;            
                        }
                            alert("Fomato de correo no valido1");
                            window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                            return false;
                        }
                        alert("¡El campo email esta vacío!");
                        window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                        return false;
                    }
                    alert('Apellido mal escrito');        
                    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                    return false;  
                }
                alert('Nombre mal escrito');      
                window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
                return false;  
            }
            alert("¡Ningun Campo deve estar vacio!");            
            window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
            return false;            
        }     
        
/*
if (nombre === "" || apellido === "" || contra === "" || confirmContra === "" ||correo === "" ){
    alert("¡Ningun Campo deve estar vacio!");            
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;            
}

if(validacionNom == false){
    alert('Nombre mal escrito');      
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;  
}

if(validacionApe1 == false){
    alert('Apellido mal escrito');        
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;  
}

if(correo === ""){
    alert("¡El campo email esta vacío!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(buscador>=1){ //Validacion correo con For
    alert("Fomato de correo no valido1");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}
if(validacionVER == false){      //Validacon email expresion regular          
        alert("Fomato de correo no valido2");
        window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
        return false;            
}

if(confirmContra ===""){
    alert("¡Confirme contraseña¡");        
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(nombre.length>200){
    alert("¡Nombre demaciado largo!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(nombre.length <= 2){
    alert("¡Nombre demaciado pequeño!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(apellido.length<=3){//Validacion Apellido
    alert("¡Apellido no valido!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(apellido.length>150){//Validacion Apellido
    alert("¡Apellido no valido!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(corre.length>245){//Validacion tamaños Email
    alert("¡Email no valido!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(corre.length <= 7){//Validacion tamaños Email
    alert("¡Email no valido!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(contra === ""){
    alert("¡Campo contraseña vacío!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
} 

if(confirmContra ===""){
    alert("¡Confirme contraseña¡");        
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(contra.length>16){//Validacion tamaños Contraseña
    alert("¡La contraseña no debe ser mayor a 16 caracteres!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}

if(contra.length <= 7){//Validacion tamaños Contraseña
    alert("¡La contraseña debe tener al menos 8 caracteres!");
    window.location.href=='../vistasCRUDRegistro\vistaAltaUsuario.php';
    return false;
}
if(contra != confirmContra){
    alert("Las contraseñas no coinciden!!!");            
    window.location.href=="../vistasCRUDRegistro/vistaAltaUsuario.php";                                     
    return false;                        
}    */

/*
        if(nombre === "" ){
            alert("¡El campo nombre está vacío!");            
            return false;            
        }else if(validacionNom == false){
            alert('Nombre mal escrito');                    
        }else if(apellido === ""){
            alert("¡El campo apellido está vacío!");
            return false;
        }else if(validacionApe1 == false){
            alert('Apellido mal escrito');        
            
        }else if(correo === ""){
            alert("¡El campo email esta vacío!");
            return false;
        }else if(buscador>=1){ //Validacion correo con For
            alert("Fomato de correo no valido1");
            return false;
        }else if(validacionVER == false){      //Validacon email expresion regular          
                alert("Fomato de correo no valido2");
                return false;            
        }else if(confirmContra ===""){
            alert("¡Confirme contraseña¡");        
            return false;
        }else if(nombre.length>200){
            alert("¡Nombre demaciado largo!");
            return false;
        }else if(nombre.length <= 2){
            alert("¡Nombre demaciado pequeño!");
            return false;
        }else if(apellido.length<=3){//Validacion Apellido
            alert("¡Apellido no valido!");
            return false;
        }else if(apellido.length>150){//Validacion Apellido
            alert("¡Apellido no valido!");
            return false;
        }else if(corre.length>245){//Validacion tamaños Email
            alert("¡Email no valido!");
            return false;
        }else if(corre.length <= 7){//Validacion tamaños Email
            alert("¡Email no valido!");
            return false;
        }else if(contra === ""){
            alert("¡Campo contraseña vacío!");
            return false;
        } else if(confirmContra ===""){
            alert("¡Confirme contraseña¡");        
            return false;
        }else if(contra.length>16){//Validacion tamaños Contraseña
            alert("¡La contraseña no debe ser mayor a 16 caracteres!");
            return false;
        }else if(contra.length <= 7){//Validacion tamaños Contraseña
            alert("¡La contraseña debe tener al menos 8 caracteres!");
            return false;
        }else if(contra != confirmContra){
            alert("Las contraseñas no coinciden!!!");            
            //window.location.href="../vistasCRUDRegistro/vistaAltaUsuario.php";                                     
            return false;                        
        }    
        */
}

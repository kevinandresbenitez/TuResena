<?PHP
    $db = mysqli_connect('localhost','root','','proyecto-php'); 

    /*  Se buscan errores en los parametros de ingreso*/
    $nombre = isset($_POST['Nombre']) ? mysqli_real_escape_string($db,$_POST['Nombre']) :false;
    $apellido = isset($_POST['Apellido']) ?  mysqli_real_escape_string($db,$_POST['Apellido']) :false;
    $email = isset ($_POST['Email']) ?  mysqli_real_escape_string($db,$_POST['Email'])  :false;
    $contraseña = isset($_POST['Contraseña']) ?  mysqli_real_escape_string($db,$_POST['Contraseña']) :false;
    $contraseña_verificacion =isset($_POST['Contraseña_verificacion']) ?  mysqli_real_escape_string($db,$_POST['Contraseña_verificacion']) :false;

    $errores=array();

    if(empty($nombre) || preg_match("/[0-9]/",$nombre)){
        $errores['nombre'] = 'El nombre es incorrecto';
    }
    if(empty($apellido) || preg_match("/[0-9]/",$apellido) ){
        $errores['apellido'] = 'El apellido es incorrecto';
    }
    if (empty($email) || !filter_var($email , FILTER_VALIDATE_EMAIL)){
        $errores['email'] = 'El Emaiil es incorrecto';
    }
    if(empty($contraseña) || empty($contraseña_verificacion) || $contraseña != $contraseña_verificacion){
        $errores['contraseña'] = 'La contraseña es incorrecta';
    }
    if(isset($contraseña) && isset($contraseña_verificacion) && $contraseña != $contraseña_verificacion){
        $errores['contraseña'] = 'Verificacion de la contraseña incorrecta ';
    }

    /*  Se buscan emails ya registrados*/


    session_start();

    $query="select count(id) as usuarios  from usuarios where email = '$email'  ;";
    include('./coneccion/coneccion.php');
    $primer_resultado= mysqli_fetch_array($respuesta_del_servidor);

    if($primer_resultado['usuarios'] > 0){
        $errores['duplicado'] = 'Este email esta en uso';        
    }


    /*  Si hay errores hace una redireccion con una session que tiene los errores , si no , crea un usuario */
    if(count($errores) > 0){
        $_SESSION['error_registro'] = $errores;
        header('location: ./index.php'); 
    }else{
        $contraseña_cifrada= password_hash($contraseña,PASSWORD_BCRYPT,['cost' => 4] );
        $query="insert into usuarios values(null,'$nombre','$apellido','$email','$contraseña_cifrada',current_timestamp(),null);";
        mysqli_query($db,$query);

        $query="select id from usuarios where email= '$email' ;";
        $usuario =mysqli_query($db,$query);

        foreach($usuario as $obj){
            $_SESSION['usuario_id']=$obj['id'];
        }

        header('location: ./index.php');  
    }



?>
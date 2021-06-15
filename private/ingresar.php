<?PHP
    $email = isset ($_POST['Email']) ? $_POST['Email'] :false;
    $contraseña = isset($_POST['Contraseña']) ? $_POST['Contraseña'] :false;


    $query="select contrasena from usuarios where email = '$email';";
    include('../coneccion/coneccion.php');
    $primer_resultado=mysqli_fetch_array($respuesta_del_servidor);
    $contraseña_cifrada= $primer_resultado['contrasena'];

    session_start();

    if(password_verify($contraseña,$contraseña_cifrada)){

        $query="select id from usuarios where email = '$email' and contrasena = '$contraseña_cifrada'  ;";
        include('../coneccion/coneccion.php');
        $primer_resultado=mysqli_fetch_array($respuesta_del_servidor);

        if(isset($primer_resultado['id'])){
            $_SESSION['usuario_id']=$primer_resultado['id'];
            header('location: ../index.php'); 
        }else{
            $_SESSION['error_ingreso'] = 'No se encontro este usuario';
            header('location: ../index.php'); 
        }

    }else{
        $_SESSION['error_ingreso'] = 'Datos erroneos';
        header('location: ../index.php'); 

    } 



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--- Para los paginas estilos --->
    <link rel="stylesheet" href="./publics/css/partials/header.css">
    <link rel="stylesheet" href="./publics/css/partials/aside.css">
    <link rel="stylesheet" href="./publics/css/partials/footer.css">
    <link rel="stylesheet" href="./publics/css/Root.css">

    <link rel="stylesheet" href="./publics/libraries/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./publics/libraries/normalize/normalize.css">
    <link rel="stylesheet" href="./publics/fonts/fonts.css">


    <link rel="stylesheet" href="./publics/css/index.css">
    <link rel="stylesheet" href="./publics/css/editar-crear2.css">


    <!--- Para ani-js y animate.css --->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <title>Ultimas Entradas</title>


</head>
<body>

<header>
    <nav class="navbar">
        <label class="hamburger_buton" >
                <input type="checkbox" data-anijs='if:click,do:$toggleClass activa,to: .navbar__items;' />
                <span >
                    <span ></span>
                    <span ></span>
                    <span ></span>
                </span>
        </label>

        <div class="navbar__logo">
            <p>LOGO</p>
        </div>

        <div class="navbar__items animate__animated activa " id='lo'>
            <a href="./">Inicio</a>
            <a href="#">Paginas Recientes</a>
            <a href="#">item</a>
            <a href="#">item</a>
        </div>

        <div class="navbar__user">
            <?PHP
                 /* Si el usuario inicio secion muestra el apartado de configuraciones  */
                session_start();

                if(isset($_SESSION['usuario_id'])){

                    $db = mysqli_connect('localhost','root','','proyecto-php');     
                    $query="select * from usuarios where id = $_SESSION[usuario_id]";
                    $info_user = mysqli_query($db,$query); 
                    $info_user=mysqli_fetch_array($info_user);



                    if($info_user['foto']){
                        $foto_perfil= "<img class='img_perfil' src=./publics/users/$info_user[foto].png alt='Foto de perfil' >";
                    }else{
                        $foto_perfil= "<span class='img_perfil_svg'><i class='fas fa-user'></i></span>";                        
                    }
            
                    echo
                    '<div class=dropdown_user>
                        <button class="button_dropdown_user " data-anijs="if:click,do:$toggleClass active">
                            '.$foto_perfil .'
                            <i class="fas fa-chevron-right"></i>                
                        </button>
        
                        <div class="dropdown_content">
                            <a href="./agregarEntradas.php"><i class="fas fa-plus"></i> <p> Agregar </p></a>
                            <a href="./misEntradas.php"><i class="fas fa-paste"></i> <p> Mis publicaciones </p></a>
                            <a href="./configuracion.php"><i class="fas fa-cog"></i> <p>Configuraciones </p></a>
                            <a href="./cerrarsesion.php"><i class="fas fa-sign-out-alt"></i> <p> Cerrar sesion </p></a>
                        </div>
        
                    </div>';

                }                
           ?>




    
        </div>

    </nav>
</header>


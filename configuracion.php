<?PHP 

    include('./partials/header.php');

    if(empty($_SESSION['usuario_id'])){
        header('location: ./index.php'); 
    }

    /*Obtener info general de el usuario*/
    $query = "select *,count(entradas.id)as entradas  from usuarios left join entradas on usuarios.id = entradas.usuario_id  where usuarios.id= $_SESSION[usuario_id] ;";
    include('./coneccion/coneccion.php');
    $usuario = mysqli_fetch_array($respuesta_del_servidor) ;



    /* Para cambiar la imagen de el usuario, si envia un imput tipe file , elimina la actual si es que tenia y agrega la nueva , si no elimina la foto */
    if(isset($_FILES['file_changer']) && $_FILES['file_changer']['size'] != 0){

        if (file_exists("./publics/users/$_SESSION[usuario_id].png")){
            unlink("./publics/users/$_SESSION[usuario_id].png");
        }


        move_uploaded_file($_FILES['file_changer']['tmp_name'],"./publics/users/$_SESSION[usuario_id].png");
        $query ="update usuarios set foto = $_SESSION[usuario_id] where id = $_SESSION[usuario_id];";
        mysqli_query($db,$query);
        header('Location: '.$_SERVER['REQUEST_URI']);

    }
    else if(isset($_POST['file_delete'])){
        $_POST['file_delete'] = false;
    
        if (file_exists("./publics/users/$_SESSION[usuario_id].png")){
            $query ="update usuarios set foto = NULL where id = $_SESSION[usuario_id];";
            mysqli_query($db,$query);
            unlink("./publics/users/$_SESSION[usuario_id].png");
            header('Location: '.$_SERVER['REQUEST_URI']);
        }
    }



?>

<h1 id="titulo_principal" >
    Configuraciones
</h1>

<div class="container_conf">
    <div class="configuraciones">
        <div class='configuraciones_user_foto' >
            <?= $usuario['foto'] ?  "<img  src=./publics/users/$usuario[foto] alt=foto_perfil>":"<span id=nel class='img_perfil_svg'><i class='fas fa-user'></i></span>" ?>

            <form action="./configuracion.php" class="config_buttons" method="POST" enctype="multipart/form-data" >
                <div>
                    <label>
                        <input type="file" name="file_changer" onchange="document.getElementById('sumbmit_img').click()" style="display:none">
                        <i class="fas fa-plus""></i>
                    </label>  

                    <label>              
                        <input type="hidden" name="file_delete" value="true" style="display:none">
                        <i class="fas fa-trash-alt" onclick="document.getElementById('sumbmit_img').click()" ></i>
                    </label>  
                </div>

                <input type="submit" value="" style="display: none;" id="sumbmit_img">

            </form>

        </div>

        <div class="configuraciones_items">
            <div>
                <strong>Nombre : </strong><p><?= $usuario['nombre']?></p>
            </div>
            <div>
                <strong>Apellido : </strong><p><?= $usuario['apellido']?></p>
            </div>
            <div>
                <strong>Email : </strong><p><?= $usuario['email']?></p>
            </div>

        </div>

    </div>

    <div class="publicaciones">
        <h2>Publicaciones</h2>
        <div>
            <p><?= $usuario['entradas'] ?$usuario['entradas']:0 ?></p>
        </div>


    </div>




</div>




<?PHP include('./partials/footer.php');?>
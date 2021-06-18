<?PHP
    $pagina_titulo='Editar Entradas';
    include('./partials/header.php');


     /* Para verificar sesion de el usuario y si hay una publicacion que modificar */
    if(empty($_SESSION['usuario_id'])){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
    }
    if(empty($_GET['entrada'])){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
    }
    
    /* Verifico que esta publicacion exista y que le pertenezca al usuario */
    $query = "select * from entradas_1 where id = $_GET[entrada] and usuario_id = $_SESSION[usuario_id];";
    include('./coneccion/coneccion.php');
    $entrada =mysqli_fetch_array($respuesta_del_servidor);


    /* Si no existe ninguna publicacion de ese usuario redirecciona */
    if(!$entrada){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
    }

    /* Modifica la publicacion con la informacion de el formulario */
    if(isset($_POST['titulo']) || isset($_POST['contenido'])){
        $query= "update entradas set titulo = '$_POST[titulo]' , descripcion = '$_POST[contenido]' where id = $_GET[entrada] ";
        mysqli_query($db,$query);
        header('location: ./misEntradas.php'); 
    }

    /* Elimina la publicacion  */
    if(isset($_GET['entrada']) && isset($_GET['borrar']) && $entrada ){
        $query = "delete from entradas where id = $_GET[entrada]";
        mysqli_query($db,$query);
        header('location: http://localhost:8081/PHP/Proyecto-PHP/misEntradas.php'); 
    }




?>
       
    <h1 id="titulo_principal">
        Editar
    </h1>

    <div class="container_entradas" >

        <?= "<form action=./editarEntradas.php?entrada=$_GET[entrada] class=form_entradas method=POST>" ?>

            <label >
                <p>Titulo</p>
                <?= "<input type=text name=titulo value='$entrada[titulo]' >" ?>
            </label>
            

            <label >
                <p>Contenido</p>
                <textarea name="contenido" id="" cols="30" rows="10">
                    <?= $entrada['descripcion'] ?>
                </textarea>
            </label>

            <div>
                <?= "<a href=./editarEntradas.php?entrada=$_GET[entrada]&borrar=true>Eliminar</a>" ?>

                <div> 
                    <a href="./misEntradas.php">Cancelar</a>
                    <input type="submit" value="Guardar">
                </div>
            </div>

            </form>
    </div>



<?PHP include('./partials/footer.php');?>
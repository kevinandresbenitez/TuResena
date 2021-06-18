<?php
/*Inicio session y defino el nombre de la pagina*/
session_start();
$pagina_titulo='Agregar Entradas';


/* Verificar la sesion de el usuario */
if(empty($_SESSION['usuario_id'])){
    header('location: ./index.php'); 
}

    /* Para crear la nueva publicacion  */
if(isset($_POST['categoria_id']) && isset($_POST['titulo']) && isset($_POST['contenido'])){
    $query = "insert into entradas values(null,'$_SESSION[usuario_id]','$_POST[categoria_id]','$_POST[titulo]','$_POST[contenido]',current_timestamp());";
    include('./coneccion/coneccion.php');
    header('location: ./misEntradas.php'); 
}
/*Importo el header*/
include('./partials/header.php');

/*Hago la consulta importando las conecciones*/
$query = "select * from categorias";
include('./coneccion/coneccion.php');



?>

    

<h1 id="titulo_principal">
        Agregar
    </h1>

    
    <div class="container_entradas" >

         <form action='./agregarEntradas.php' class='form_entradas' method='POST'>

            <label >
                <p>Titulo</p>
                 <input type='text' name='titulo' value='' required> 
            </label>

            <label >
                <p>Categia</p>
                <select name="categoria_id"  id="">            
                <?PHP 
                        foreach($respuesta_del_servidor as $obj){
                                echo "<option value=$obj[id]>$obj[nombre]</option>";
                        }                
                ?>
                </select>
            </label>


            <label >
                <p>Contenido</p>
                <textarea name="contenido" id="" cols="30" rows="10" required>
                </textarea>
            </label>

            <div>
                <div> 
                    <a href="./misEntradas.php">Cancelar</a>
                    <input type="submit" value="Agregar">
                </div>
            </div>

            </form>
    </div>



<?PHP include('./partials/footer.php');?>
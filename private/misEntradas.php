<?PHP 
    /* Header */
    include_once('./partials/header.php'); 

    if(empty($_SESSION['usuario_id'])){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
    }

        /* Paginacion y busquda*/

        if(!empty($_GET['page']) && $_GET['page'] &&(int)$_GET['page'] ){                                    
            $pagina=(int)$_GET['page'];
        }else{
            $pagina=0;
        }

        $Pagina__Siguiente=$pagina +5 ;
        $Pagina__Anterior=$pagina -5 ;

        if(!empty($_GET['search'])){
            $busqueda =$_GET['search'];
            $query ="select * from entradas_1 where nombre like '%$busqueda%' and usuario_id = $_SESSION[usuario_id] or titulo like '%$busqueda%' and usuario_id = $_SESSION[usuario_id] or descripcion like '%$busqueda%' and usuario_id = $_SESSION[usuario_id] or fecha like '%$busqueda%' and usuario_id = $_SESSION[usuario_id] order by fecha desc limit 6 offset $pagina ";
        }else{
            $query ="select * from entradas_1 where usuario_id = $_SESSION[usuario_id] order by fecha desc limit 6 offset $pagina";
        }  

        /* Coneccion a la base de datos despues de definir el query*/
        include_once('./coneccion/coneccion.php');
        $cantidad_resultados= sizeof(mysqli_fetch_all($respuesta_del_servidor));

        
        /* Titulo Principal */

        if(!empty($busqueda) && empty($titulo_principal)){
            echo '<h1 id=titulo_principal>'.'Resultados de : '.$busqueda.'</h1>';
        }
        else{            
            echo '<h1 id=titulo_principal>Mis Entradas</h1>';
        }


?>


<form action="./misEntradas.php" class="formulario__buscar animate__animated" <div class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,before:$scrollReveal">
        <label for="Buscador">Buscar</label>
        <input type="text" name="search" id="Buscador">
        <input type="submit" value="Buscar">
    </form>

<div class="container">
    <article class="articulo">
            
               

    <?PHP     foreach($respuesta_del_servidor as $key => $datos):    ?>             
                <?PHP    if($key <= 4): ?>
                        <?PHP 
                            if($datos['foto']){
                                $foto_perfil= "<img class='img_perfil' src=./publics/users/$datos[foto].png alt='Foto de perfil' >";
                            }else{
                                $foto_perfil= "<span class='img_perfil_svg'><i class='fas fa-user'></i></span>";
                            }
                        ?>
                        <div class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,to: .item,before:$scrollReveal">
                            <div class="item__encabezado ">
                                <div>
                                    <?= $foto_perfil ?>

                                    <div>
                                        <p><?=$datos['nombre'].' '.$datos['apellido'] ?></p>
                                        <p><?=$datos['fecha'] ?></p>
                                    </div>

                                </div>

                                <div>
                                    <?= "<a href=./editarEntradas.php?entrada=$datos[id]>"."<i class='fas fa-edit'></i>".'Editar'. '</a>' ?>
                                </div>
                            </div>

                            <div class="item__contenido">
                                <h3><?= $datos['titulo']?></h3>
                                <p><?=$datos['descripcion']?></p>
                            </div>
                        </div>
                        
                <?PHP endif;?>
    <?PHP endforeach ; ?>     

    <?PHP if($cantidad_resultados <= 0 ):?>

        <?PHP if(empty($_GET['search'])) :?>
            <h2 id="Sin_resultados" class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,before:$scrollReveal" >
                Aun no tiene publicaciones ...
            </h2>
        <?PHP else: ?>
            <h2 id="Sin_resultados" class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,before:$scrollReveal" >
            No se encontraron resultados ...
        </h2>
        <?PHP endif; ?>

    <?PHP endif;?>
                
            

            <div class="articulo__mostrar_mas animate__animated" data-anijs='if:scroll,on:window,do: animate__fadeInLeft,to: .articulo__mostrar_mas,before:$scrollReveal'>
                    <?PHP
                        if($pagina >= 5){
                            if(!empty($busqueda)){
                                echo "<a href=./misEntradas.php?page=$Pagina__Anterior&search=$busqueda >Atras</a>" ;
                            }else{
                                echo "<a href=./misEntradas.php?page=$Pagina__Anterior >Atras</a>" ;
                            }
                        }   
                        
                        if($cantidad_resultados > 5 ){
                            if(!empty($busqueda)){
                                echo "<a href=./misEntradas.php?page=$Pagina__Siguiente&search=$busqueda >Siguiente</a>" ;
                            }else{
                                echo "<a href=./misEntradas.php?page=$Pagina__Siguiente >Siguiente</a>" ;
                            }
                        }
                    ?>
            </div>
    </article>

</div>


 
<?PHP include_once('./partials/footer.php'); ?>
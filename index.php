

<?PHP 
    /* Header */
    include_once('./partials/header.php'); 

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
        $query ="select * from entradas_1 where nombre like '%$busqueda%' or titulo like '%$busqueda%' or descripcion like '%$busqueda%' or fecha like '%$busqueda%' order by fecha desc limit 6 offset $pagina ";
    }else{
        $query ="select * from entradas_1 order by fecha desc limit 6 offset $pagina";
    }  

    /* Coneccion a la base de datos despues de definir el query*/
    include_once('./coneccion/coneccion.php');
    $cantidad_resultados= sizeof(mysqli_fetch_all($respuesta_del_servidor));

    /* Titulo Principal */

    if(!empty($busqueda) && empty($titulo_principal)){
        echo '<h1 id=titulo_principal>'.'Resultados de : '.$busqueda.'</h1>';
    }
    else{
        echo '<h1 id=titulo_principal>Nuestras ultimas entradas</h1>';
    }
    
?>  



    <form action="./index.php" class="formulario__buscar animate__animated" <div class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,before:$scrollReveal">
        <label for="Buscador">Buscar</label>
        <input type="text" name="search" id="Buscador">
        <input type="submit" value="Buscar">
    </form>

<div class="container">
    <article class="articulo">
            
               

    <?PHP foreach($respuesta_del_servidor as $key => $datos):?>             
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



                                
                            </div>

                            <div class="item__contenido">
                                <h3><?= $datos['titulo']?></h3>
                                <p><?=$datos['descripcion']?></p>
                            </div>
                        </div>
                        
                <?PHP endif;?>
    <?PHP endforeach ; ?>     

    <?PHP if($cantidad_resultados <= 0 ):?>
        <h2 id="Sin_resultados" class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,before:$scrollReveal" >
            No se encontraron resultados ...
        </h2>
    <?PHP endif;?>    
            

            <div class="articulo__mostrar_mas animate__animated" data-anijs='if:scroll,on:window,do: animate__fadeInLeft,to: .articulo__mostrar_mas,before:$scrollReveal'>
                    <?PHP
                        if($pagina >= 5){
                            if(!empty($busqueda)){
                                echo "<a href=./index.php?page=$Pagina__Anterior&search=$busqueda >Atras</a>" ;
                            }else{
                                echo "<a href=./index.php?page=$Pagina__Anterior >Atras</a>" ;
                            }
                        }   
                        
                        if($cantidad_resultados > 5 ){
                            if(!empty($busqueda)){
                                echo "<a href=./index.php?page=$Pagina__Siguiente&search=$busqueda >Siguiente</a>" ;
                            }else{
                                echo "<a href=./index.php?page=$Pagina__Siguiente >Siguiente</a>" ;
                            }
                        }
                    ?>
            </div>
    </article>

    <?PHP include_once('./partials/aside.php');?>  
</div>

<?PHP include_once('./partials/footer.php') ?>


    

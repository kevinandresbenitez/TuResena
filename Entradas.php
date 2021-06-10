<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./publics/css/partials/navbar.css">
    <link rel="stylesheet" href="./publics/css/partials/form.css">
    <link rel="stylesheet" href="./publics/css/partials/footer.css">
    <link rel="stylesheet" href="./publics/css/Root.css">


    <link rel="stylesheet" href="./publics/libraries/normalize/normalize.css">
    <link rel="stylesheet" href="./publics/fonts/fonts.css">


    <link rel="stylesheet" href="./publics/css/entradas.css">



    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <title>Ultimas Entradas</title>

</head>
<body>

    
    
    <?PHP
    
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

        $coneccion = mysqli_connect('localhost','root','','proyecto-php');     
        $peticion = mysqli_query($coneccion,$query);
        $resultados=mysqli_fetch_all($peticion);
    ?>

    <header>
        <?PHP include_once('./partials/navbar.php'); ?>  
    </header>

    <?PHP
        if(!empty($busqueda)){
            echo '<h1 id=titulo_principal>'.'Resultados de : '.$busqueda.'</h1>';
        }else{
            echo '<h1 id=titulo_principal>Nuestras ultimas entradas</h1>';
        }

    ?>

    <form action="./Entradas.php" class="formulario__buscar animate__animated" <div class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,before:$scrollReveal">
        <label for="Buscador">Buscar</label>
        <input type="text" name="search" id="Buscador">
        <input type="submit" value="Buscar">
    </form>

    <div class="container">
        <article class="articulo">
                
                <?PHP     
                    foreach($peticion as $key => $datos){                
                        if($key <= 4){
                            echo '<div class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,to: .item,before:$scrollReveal">'.
                                '<div class="item__encabezado ">'.
                                    "<img src=./publics/users/$datos[foto].png alt='Foto de perfil' >".
                                    '<div>'
                                        .'<p>'.$datos['nombre'].'</p>'
                                        .'<p>'.$datos['fecha'] .'</p>'.
                                    '</div>'
                                .'</div>'

                                .'<div class="item__contenido">'
                                    .'<h3>'.$datos['titulo'].'</h3>'
                                    .'<p>'.$datos['descripcion'].'</p>'
                                .'</div>'
                            .'</div>';}
                    };

                    if(empty($resultados)){
                        echo '<h2 id="Sin_resultados" class="item animate__animated" data-anijs="if:scroll,on:window,do: animate__fadeInLeft,before:$scrollReveal" >'
                        .'No se encontraron resultados ...'.
                        '</h2>';
                    }
                    
                ?>

                <div class="articulo__mostrar_mas animate__animated" data-anijs='if:scroll,on:window,do: animate__fadeInLeft,to: .articulo__mostrar_mas,before:$scrollReveal'>
                        <?PHP
                            if(sizeof($resultados) > 5 ){
                                if(!empty($busqueda)){
                                    echo "<a href=./Entradas.php?page=$Pagina__Siguiente&search=$busqueda >Siguiente</a>" ;
                                }else{
                                    echo "<a href=./Entradas.php?page=$Pagina__Siguiente >Siguiente</a>" ;
                                }
                            }
                            if($pagina >= 5){
                                if(!empty($busqueda)){
                                    echo "<a href=./Entradas.php?page=$Pagina__Anterior&search=$busqueda >Atras</a>" ;
                                }else{
                                    echo "<a href=./Entradas.php?page=$Pagina__Anterior >Atras</a>" ;
                                }
                            }                                            
                        ?>
                </div>
        </article>

        <aside class="aside">
            <?PHP include_once('./partials/formulario.php');?>  
        </aside>
    </div>

    <?PHP include_once('./partials/footer.php') ?>


    

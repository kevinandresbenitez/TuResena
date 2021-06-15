<?PHP
    session_start();

    if(empty($_SESSION['usuario_id'])){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
    }
    if(empty($_GET['entrada'])){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
    }

    $query = "select * from entradas_1 where id = $_GET[entrada] and usuario_id = $_SESSION[usuario_id];";
    include('./coneccion/coneccion.php');
    $entrada =mysqli_fetch_array($respuesta_del_servidor);

    
    if(!$entrada){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/misEntradas.php'); 
    }

    $query = "delete from entradas where id = $_GET[entrada]";
    mysqli_query($db,$query);
    header('location: http://localhost:8081/PHP/Proyecto-PHP/misEntradas.php'); 


?>
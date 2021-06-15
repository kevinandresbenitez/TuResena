<?PHP 

    session_start();

    if(empty($_SESSION['usuario_id'])){
        header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
    }


?>
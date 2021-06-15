<?PHP 
    session_start();
    session_destroy();
    header('location: http://localhost:8081/PHP/Proyecto-PHP/index.php'); 
?>
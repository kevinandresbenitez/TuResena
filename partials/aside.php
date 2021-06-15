<aside class="aside">

<div class="container__form">


    <form action="./private/ingresar.php" method="POST">
        <div class="item iniciar__sesion">

            <div class="Error">
                <?PHP  
                    if(isset($_SESSION['error_ingreso'])){ 
                        echo '<p>'. $_SESSION['error_ingreso'].'</p>';
                        unset($_SESSION['error_ingreso']);
                    }
                ?>
            </div>

            <div>
                <label for="Email_iniciar">Email</label>  
                <input type="email" name="Email" id="Email__iniciar" pattern='(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])'  required>
            </div>

            <div>
                <label for="Contraseña_iniciar">Contraseña</label>
                <input type="password" name="Contraseña" id="Contraseña__iniciar" minlength="6" required>
            </div>

            <input type="submit" value="Iniciar Sesion">
        </div>
    </form>

    <form action="./private/registro.php" method="POST">
        <div class="item registrar__sesion" >
            <div class="Error">
                <?PHP  
                    if(isset($_SESSION['error_registro'])){ 
                        $error = $_SESSION['error_registro'];
                        foreach($error as $obj){
                            echo '<p>'.$obj.'</p>';
                        }
                        session_destroy();
                    }
                ?>
            </div>

            <div>
                <label for="Nombre_registrar">Nombre</label>
                <input type="text" name="Nombre" id="Nombre_registrar" required>
            </div>

            <div>
                <label for="Apellido_registrar">Apellido</label>
                <input type="text" name="Apellido" id="Apellido_registrar" required>
            </div>


            <div>
                <label for="Email_registrar">Email</label>  
                <input type="email" name="Email" id="Email_registrar" pattern='(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])'  required>
            </div>

            <div>
                <label for="Contraseña_registrar">Contraseña</label>
                <input type="password" name="Contraseña" id="Contraseña_registrar" minlength="6" required>
            </div>

            <div>
                <label for="Contraseña_verificacion_registrar">Contraseña Verificacion</label>
                <input type="password" name="Contraseña_verificacion" id="Contraseña_verificacion_registrar" minlength="6" required>
            </div>

            <input type="submit" value="Registrarse">
        </div>
    </form>

</div>

</aside>

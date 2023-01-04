<?php

require 'includes/app.php';
$db = conectarDB();

$errores = [];



// * Autenticar el Usuario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    // * Validar si es un correo valido
    $email = mysqli_real_escape_string($db , filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db,$_POST['password']) ;

    if(!$email){
        $errores[] = "El email es obligatorio o no es valido";
    }

    if(!$password){
        $errores[] = "El Password es obligatorio";
    }

    if(empty($errores)){

        // * Ingresa a la tabla y ve si existe ya un usuario
        $query = "SELECT * FROM usuarios WHERE email = '{$email}' ";
        $resultado = mysqli_query($db , $query);

        // var_dump($resultado);

        if ($resultado->num_rows){
            // revisar si el password es correctos
            $usuario = mysqli_fetch_assoc($resultado);
            //verificar si el password es correcto
            $auth = password_verify($password, $usuario["password"] ); //se le pasan 2 valores asi verifica si el password es correcto
 
            // echo "<pre>";
            // var_dump($usuario);
            // echo " </pre>";
 
            // echo "<pre>";
            // var_dump($auth);
            // echo " </pre>";

            if($auth){
                // * El Usuario esta autenticado
                session_start();

                // lENAR EL ARREGLO DE LA SESION
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;


                header('Location: /admin');
                // echo "<pre>";
                // var_dump($_SESSION);
                // echo " </pre>";
            }
 
           
        }else{
            $errores [] = "El usuario no existe";
        }
    }


}

// * Incluye Header 

incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error;?>
        </div>

    <?php endforeach; ?>

    <form method="POST" action="" class="formulario" novalidate>
        <fieldset>
            <legend>Email y Password</legend>


            <label for="email">Email</label>
            <input type="email" placeholder="Tu Email" id="email" name="email" >

            <label for="password">Password</label>
            <input type="password" placeholder="Tu Password" id="password" name="password" >


        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">

    </form>

</main>


<?php
incluirTemplate('footer');
?>
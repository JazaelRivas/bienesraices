<?php 

require 'includes/config/database.php';
$db = conectarDB();

// * Crear un email y password
$email = "correo@correo.com"; 
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_BCRYPT);

$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}' , '{$passwordHash}')";

mysqli_query($db , $query);

?>
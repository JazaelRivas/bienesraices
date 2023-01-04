<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');


function incluirTemplate( string  $nombre, bool $inicio = false ) {
   include TEMPLATES_URL . "/{$nombre}.php"; 
}


function estaAutenticado()  {
session_start();

   // $auth = $_SESSION['login'];
   // if($$_SESSION['login']){
   //    return true;
   // }
   
   if(!$_SESSION['login']){
      header('Location: /');
   }
   return true;
  
}

function debugear($variable){
   echo "<pre>";
   var_dump($variable);
   echo "</pre>";
   exit;
}
<?php

namespace App;

class Propiedad {

    protected static $db;

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        // Base de Datos

        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? 'imagen.jpg';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }

    public function guardar(){
       
        $query = " INSERT INTO propiedades (titulo , precio , imagen, descripcion , habitaciones , wc , estacionamiento , creado , vendedores_id )
        VALUES ( '$this->titulo' , '$this->precio' ,'$this->imagen' , '$this->descripcion' , '$this->habitaciones' , '$this->wc' , '$this->estacionamiento' , '$this->creado' ,  '$this->vendedores_id' )";

        debugear($query);
    }

    // * Definir la conexion

    public static function setDB($database){
        // ? Self para hacer referencia a todo lo que este como static
        self::$db = $database;
    }
}
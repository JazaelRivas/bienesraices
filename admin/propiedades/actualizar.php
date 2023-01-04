<?php

require '../../includes/app.php';
$auth = estaAutenticado();
if(!$auth){
header('Location: /');
}

    $id = $_GET['id'];
    $id = filter_var($id , FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: /admin');
    }


    $db = conectarDB();

    // * 
    $consulta = "SELECT * FROM propiedades WHERE id = {$id} ";
    $resultado = mysqli_query($db , $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    
    // * Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //  * Arreglo con mensaje de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedor_id = $propiedad['vendedor_id'];
    $imagenPropiedad = $propiedad['imagen'];

// Ejecutar el codigo despues de que el usuario envio el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";

    // * Para archivos
    // echo "<pre>";
    // var_dump($_FILES);
    //  echo "<pre>";





    $titulo = mysqli_real_escape_string($db ,  $_POST['titulo']);
    $precio = mysqli_real_escape_string($db ,  $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db ,  $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db ,  $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db ,  $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db ,  $_POST['estacionamiento']);
    $vendedor_id = mysqli_real_escape_string($db ,  $_POST['vendedor_id']);
    $creado = date('Y/m/d');

    $imagen = $_FILES['imagen'];


    


    // * Validacion del form 
    if (!$titulo) {
        $errores[] = "Debes agregar un titulo";
    }

    if (!$precio) {
        $errores[] = "Debes agregar un precio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "Debes agregar una descripcion";
    }

    if (!$habitaciones) {
        $errores[] = "Debes agregar Habitaciones";
    }

    if (!$wc) {
        $errores[] = "Debes agregar los WC";
    }

    if (!$estacionamiento) {
        $errores[] = "Debes agregar  estacionamiento";
    }

    if (!$vendedor_id) {
        $errores[] = "Debes seleccionar un vendedor";
    }

    
       
        //Validar imagen por tamaño (100 KB máximo)
     
        $medida = 1000 * 100;
     
        if($imagen['size'] > $medida) {
            $errores[] = 'La Imagen es muy pesada';
        
        }
     
   
   

    // echo "<pre>";
    // var_dump($errores);
    // echo "<pre>";

    // * Revisar que el array de valores este vacio
    if (empty($errores)) {

        // //** Subida de Archivos **/

        // //* Crear Carpeta
        $carpetaImagenes = '../../imagenes/';

        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        // * Vacia para que se vuelva a llenar si actualizamos una foto vacia
        $nombreImagen = '';

        if($imagen['name']){
           // * Eliminar imagen previa
            unlink($carpetaImagenes . $propiedad['imagen']);

            // * Generar un Nombre Aleatorio
            $nombreImagen = md5(uniqid( rand(), true)) . ".jpg";

            // * Subir la Imagen
            // var_dump($nombreImagen);
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen  );   
        } else {
            $nombreImagen = $propiedad['imagen'];
        }
            

   

    
       

       // * Insertar en la base de datos
        $query = " UPDATE propiedades SET titulo = '{$titulo}' ,  precio = {$precio} , imagen = '{$nombreImagen}' , descripcion = '{$descripcion}' , habitaciones = {$habitaciones},
        wc = {$wc} , estacionamiento = {$estacionamiento} , vendedor_Id = {$vendedor_id} WHERE id = {$id}";

         //* Comprobar queries antes de completar codigo
        // * echo $query;


        $resultado = mysqli_query($db, $query);
        
        if($resultado){
            // * Redireccionar al usuario despues de que se envia un query correctamente
            header('Location: /admin?resultado=2');
        }
       
    }
}



incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST"  enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo</label>
            <input 
            type="text" 
            id="titulo" 
            name="titulo" 
            placeholder="Titulo Propiedad" 
            value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input 
            type="number" 
            id="precio" 
            placeholder="Precio Propiedad" 
            name="precio" 
            value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input 
            type="file" 
            id="imagen" 
            accept="image/jpeg , image/png"
            name="imagen"
            >

            <img src="/imagenes/<?php echo  $imagenPropiedad ?>" alt="" class="imagen-small">

            <label for="descripcion">Descripcion</label>
            <textarea 
            id="descripcion" 
            name="descripcion"><?php echo $descripcion; ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input 
            type="number" 
            id="habitaciones" 
            placeholder="Ej: 3" 
            min="1" max="10" 
            name="habitaciones" 
            value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input 
            type="number" 
            id="wc" 
            placeholder="Ej: 3" 
            min="1" 
            max="10" 
            name="wc" 
            value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input 
            type="number" 
            id="estacionamiento" 
            placeholder="Ej: 3" 
            min="1" 
            max="10" 
            name="estacionamiento" 
            value="<?php echo $estacionamiento; ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor_id" >
                <option value="">>-- Seleccione --<</option>
                <?php while($vendedor_id = mysqli_fetch_assoc($resultado)) :?>
                    <option <?php echo $vendedor_id === $vendedor_id['id'] ? 'selected' : '';?>  value="<?php echo $vendedor_id['id']?>"><?php echo $vendedor_id['nombre'] . " " . $vendedor_id['apellido']?></option>
                <?php endwhile;  ?>
            </select>

        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer', $inicio = true);
?>
<?php
     require 'includes/funciones.php';
     incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

       
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>28/12/2022</span> por: <span>Admin</span></p>

        <div class="resumen-propiedad">
          
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ipsam nisi distinctio officia ratione obcaecati fuga voluptates maiores, 
                possimus dolorem minima quaerat perferendis numquam qui tenetur animi at culpa! Sed, iste?
            </p>
        </div>
    </main>

<?php
    incluirTemplate('footer', $inicio = true);
?>
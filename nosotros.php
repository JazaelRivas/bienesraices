<?php
     require 'includes/app.php';
     incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen sobre nosotros">
                </picture>
            </div>

            <div class="text-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ducimus fuga vel odit et maiores laboriosam, 
                     eligendi earum harum illum totam officiis est voluptate atque dolor. 
                     Nesciunt alias unde iste dolor!
                     Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ducimus fuga vel odit et maiores laboriosam, 
                     eligendi earum harum illum totam officiis est voluptate atque dolor. 
                     Nesciunt alias unde iste dolor!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Ducimus fuga vel odit et maiores laboriosam, 
                     eligendi earum harum illum totam officiis est voluptate atque dolor. 
                     Nesciunt alias unde iste dolor!
                </p>
            </div>

        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img//icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit. Aliquid optio quidem suscipit provident
                    delectus, rem est doloremque cum illum
                    voluptatem molestiae repellendus eveniet
                    numquam magni alias eius facere ipsa libero.
                </p>
            </div> <!-- .icono -->
            <div class="icono">
                <img src="build/img//icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit. Aliquid optio quidem suscipit provident
                    delectus, rem est doloremque cum illum
                    voluptatem molestiae repellendus eveniet
                    numquam magni alias eius facere ipsa libero.
                </p>
            </div> <!-- .icono -->
            <div class="icono">
                <img src="build/img//icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet,
                    consectetur adipisicing elit. Aliquid optio quidem suscipit provident
                    delectus, rem est doloremque cum illum
                    voluptatem molestiae repellendus eveniet
                    numquam magni alias eius facere ipsa libero.
                </p>
            </div> <!-- .icono -->
        </div>
    </section>

<?php
    incluirTemplate('footer', $inicio = true);
?>
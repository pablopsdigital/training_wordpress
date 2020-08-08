<?php get_header(); ?>

<main class="conteiner">

    <!--Condicional para saber si tenemos información/contenido que mostrar
si queda contenido devuelve true si no queda contenido false-->
    <?php if (have_posts()) {

        //Mientras quede contenido
        while (have_posts()) {
            //Con función the_post comprobamos si queda contenido o no
            //en cada vuelta de bucle
            the_post();
    ?>

            <!--Cargar el titulo-->
            <h1 class="my-3"><?php the_title(); ?></h1>

            <!--Cargar el contenido de la página-->
            <?php the_content(); ?>

    <?php }
    } ?>

</main>

<?php get_footer(); ?>
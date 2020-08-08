<?php get_header(); ?>

<main class="continer my-3">

    <!--Crear bucle para mostar el post y el contenido?-->
    <?php if (have_posts()) {

        while (have_posts()) {
            the_post();
    ?>
            <h1 class='my-3'><?php the_title(); ?></h1>
            <div class="row">
                <div class="col-4">
                    <!--Cargar la imagen destacada-->
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class="col-8">
                    <!--Cargarmos el contenido de la página-->
                    <?php the_content(); ?>
                </div>
            </div>


            <?php get_template_part('template_parts/post', 'navigation') ?>
    <?php }
    } ?>
</main>

<?php get_footer(); ?>
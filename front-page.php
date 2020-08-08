<?php get_header(); ?>

<main class="continer my-3">

    <!--Crear bucle para mostar el post y el contenido?-->
    <?php if (have_posts()) {

        while (have_posts()) {
            the_post();
    ?>
            <h1 class='my-3'><?php the_title(); ?> - Página principal</h1>
            <div class="row">
                <?php the_content(); ?>
            </div>
    <?php }
    } ?>

    <!--Loop personalizado mostrar listado de productos-->
    <div class="product-list my-5">
        <h2 class="text-center">Productos</h2>
        <div class="row">
            <?php
            //Especificamos los argumentos que tendra el Query personalizado
            //post_type -> el nombre del custom type a consultar, nombre que se puso en el register
            //order y orderby para ordenar
            $args = array(
                'post_type' => 'producto',
                'post_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'title'
            );

            //Crear una instancia de query
            $productos = new WP_Query($args);

            //Loop personalizado, en este caso have_post es un método de la instancia query $productos
            if ($productos->have_posts()) {

                while ($productos->have_posts()) {
                    $productos->the_post();
            ?>
                    <div class="col-4">
                        <figure>
                            <!--Se carga la imagen destacada del producto-->
                            <?php the_post_thumbnail('large'); ?>
                        </figure>
                        <h4 class="my-3 text-center">
                            <!--La función the permalink, retorna la url al producto-->
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h4>

                    </div>
                    <!--Html con el listado de productos-->
            <?php
                }
            }

            ?>

        </div>
    </div>
</main>

<?php get_footer(); ?>
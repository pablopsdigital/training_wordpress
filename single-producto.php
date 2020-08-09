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

            <!--Filtrar productos relacionados en base a la taxonomia/categoría asignada, esta función devuelve un array, en este caso no lo recorremos porque ya sabemos que solo pertenece a un tipo de categoría en caso de tener varios debemos recorrer el array-->
            <?php $taxonomia = get_the_terms(get_the_ID(), 'categoria-productos'); ?>

            <!--Loop personalizado de productos-->
            <?php

            $ID_producto_actual = get_the_ID();

            $args = array(
                'post_type' => 'producto',
                'posts_per_page' => 6,
                'order' => 'ASC',
                'orderby' => 'title',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'categoria-productos',
                        'field' => 'slug', //campos a tener en cuenta en la consulta
                        'terms' => $taxonomia[0]->slug, //solo usamos el primer elemento
                        'post_not_in' => array($ID_producto_actual) //Evitar el propio producto
                    )
                ),
            );
            //Constructor loop
            $productos = new WP_Query($args);
            ?>

            <!--Veficiar que en el sitio existen página de producto, tenemos
            que hacer uso de los métodos de $producto-->
            <?php if ($productos->have_posts()) { ?>
                <div class="row text-center justify-content-center productos-relacionados">
                    <div class="col-12">
                        <h3 class="my-3 text-center">Productos relacionados</h3>
                    </div>

                    <!--While para recorrer los posibles páginas-->
                    <?php while ($productos->have_posts()) {
                        $productos->the_post();
                        //Descartar el id actual
                        if (get_the_ID() != $ID_producto_actual) {
                    ?>
                            <div class="col-2 my-3 text-center">
                                <?php the_post_thumbnail('thumbnail'); ?>
                                <h4>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                            </div>
                    <?php }
                    } ?>
                </div>
    <?php }
        }
    } ?>
</main>

<?php get_footer(); ?>
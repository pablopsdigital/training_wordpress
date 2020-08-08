<?php get_header(); ?>

<main class="continer my-3">

    <div class="pagina404">
        <h1>404</h1>
        <h2> Página no encontrada</h2>
        <!--Con la función home_url obtenemos la url del sitio-->
        <h3>Haga <a href="<?php echo home_url() ?>">click aquí</a> para regresar a la página principal</h3>
    </div>

</main>

<?php get_footer(); ?>
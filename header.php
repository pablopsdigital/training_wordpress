<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Llamar hook wp_head para cargar cabecera-->
    <?php wp_head() ?>
</head>

<body>

    <!--header-->
    <header>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-4 py-2">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/brand_white.png" alt="brand pablopsdigital.com">
                </div>
                <div class="col-8">
                    <nav>
                        <?php wp_nav_menu(
                            array(

                                //Posición del menu en el administrador
                                'theme_location' => 'top_menu',
                                //agregar clase estilos menu
                                'menu_class' => 'menu-principal',
                                //agregar clase estilos contenedor
                                'container_class' => 'container-menu'
                            )
                        );
                        ?>
                    </nav>
                </div>
            </div>

        </div>

    </header>
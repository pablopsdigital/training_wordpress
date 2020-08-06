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
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/brand.png" alt="brand pablopsdigital.com">
                </div>

            </div>

        </div>

    </header>
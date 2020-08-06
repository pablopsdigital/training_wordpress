<?php


//Función para ejecutar al inicializar el theme
function init_template()
{
    //Support imagen destacada
    add_theme_support('post-thumbnails');

    //Support titulo de página
    add_theme_support('title-tag');
}

//Llamada al hook after_setup_theme para insertar la fucnión
add_action('after_setup_theme', 'init_template');

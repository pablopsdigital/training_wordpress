<?php


//Función para ejecutar al inicializar el theme
//=======================================================================================
function init_template()
{
    //Support imagen destacada
    add_theme_support('post-thumbnails');

    //Support titulo de página
    add_theme_support('title-tag');
}

//Llamada al hook after_setup_theme para insertar la fucnión
add_action('after_setup_theme', 'init_template');


//Función para cargar liberías//========================================================================================
function load_assets()
{

    //CARGAR FICHEROS CSS EXTERNOS
    //Registrar fichero css de boostrap
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css', '', '4.5.0', 'all');

    //Registar tipografia google
    wp_register_style('montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat&display=swap', '', '1.0', 'all');

    //Cargar el style.css y encolar las dependencias que acabamos de registrar 
    wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap', 'montserrat'), '1.0', 'all');

    //CARGAR FICHEROS SCRIPT EXTERNOS
    //Cargar fichero js para popper, el último argumento es por si queremos que se carge y ejecute en el footer-true o el el header-false
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', '', '1.16.1', true);

    //Encolar scripts, cargar boostrap, jquery y poper
    wp_enqueue_script('boostraps', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js', array('jquery', 'popper'), '', '4.5.1', true);

    //Encolar un fichero de script personalizado
    //Debemos cargarlo de forma dinámica para que en cada url diferente el fichero
    //se encuentre
    //La fucnión get_template_directory_uri() devuelve el directorio del theme
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', '', '1.0', true);
}

//El hook wp_enqueue_scripts se ejecuta al renderizar inicialmente la página
add_action('wp_enqueue_scripts', 'load_assets');

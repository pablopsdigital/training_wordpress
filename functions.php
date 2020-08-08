<?php

//========================================================================================
//Función para ejecutar al inicializar el theme
//=======================================================================================
function init_template()
{
    //Support imagen destacada
    add_theme_support('post-thumbnails');

    //Support titulo de página
    add_theme_support('title-tag');

    //Registrar una localización para un menu
    register_nav_menus(
        array('top_menu' => 'Menú Principal')
    );
}

//Llamada al hook after_setup_theme para insertar la fucnión
add_action('after_setup_theme', 'init_template');

//========================================================================================
//Función para cargar liberías
//========================================================================================
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

//========================================================================================
//Crear un Sidebar
//========================================================================================
function sidebar()
{
    register_sidebar(
        array(

            //Datos de configuración widget
            'name' => 'Pie de página',
            'id' => 'footer',
            'description' => 'Zona de widget para el pie de página',
            //Carga antes del titulo
            'before_title' => '<p>',
            'after_title' => '</p>',

            //Cargar el contenido del widget
            //con %1$s toma el valor id del widget o las clases css con %2$s
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        )
    );
}

//Hook para cargar el sidebar
add_action('widgets_init', 'sidebar');

//========================================================================================
//Custom post type productos
//========================================================================================
function productos_type()
{

    $labels = array(
        'name' => 'Productos',
        'sincular_name' => 'Producto',
        'menu_name' => 'Productos',
    );

    //Definición de argumentos
    $args = array(
        'label' => 'Productos',
        'descripction' => 'Productos de prueba',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
        'public' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'can_export' => true,
        'publicly_queryable' => true,
        'rewrite' => true,
        'show_in_rest' => true,

    );

    //Registramos nombre post type y argumentos de configuración
    register_post_type('producto', $args);
}

// Hook init se ejecuta despues de worpdress setee el theme que usuamos
add_action('init', 'productos_type', 0);

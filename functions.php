<?php

function ppr($pre) {
    ?>
    <pre>
       <?php print_r($pre)?>
   </pre>
    <?php
}
require_once get_template_directory() . '/area-conn.php';

function home_script_enqueue() {
    /*CSS*/
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');

    /*JavaScript*/
    wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);

    /* Bootstrap CSS */
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2', 'all' );

    /* Bootstrap Bundle JavaScript */
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.2', true );

}

add_action('wp_enqueue_scripts', 'home_script_enqueue');

function register_my_menus() {
    register_nav_menus(
        array(
            'Menu Principal' => __( 'Menu Principal' ),
            'Menu Mobile' => __( 'Menu Mobile'),
            'Menu Footer' => __( 'Menu Footer' ),
            'Menu Institucional' => __( 'Menu Institucional' ),
            'Menu Areas' => __( 'Menu Areas' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );



function course_area($area){
    $area_name = [
        'direito' => 'Direito',
        'educacao' => 'Educação',
        'psicologia' => 'Psicologia',
        'servico-social' => 'Serviço Social',
        'artes-moda-e-musica' => 'Artes, Moda e Música',
        'ciencias' => 'Ciências',
        'comunicacao-social' => 'Comunicação Social',
        'concursos' => 'Concursos',
        'empresarial-e-mba' => 'Empresarial e MBA',
        'engenharia-e-arquitetura' => 'Engenharia e Arquitetura',
        'esportes' => 'Esportes',
        'gastronomia' => 'Gastronomia',
        'gestao-e-logistica-e-economia' => 'Gestão e Logística',
        'marketing-e-coaching' => 'Marketing e Coaching',
        'meio-ambiente' => 'Meio Ambiente',
        'saude-e-estetica-e-farmacia' => 'Saúde e Estética',
        'seguranca-publica' => 'Segurança Publica',
        'tecnologia-da-informacao' => 'Tecnologia da Informação',
    ];

    if (array_key_exists($area, $area_name)) {
        return $area_name[$area];
    } else {
        return 'Area não encontrado';
    }
}

function course_name($key){
    $courses = [
        'direito-eleitoral' => 'Direito Eleitoral',
        'direito-ambiental' => 'Direito Ambiental'
    ];

    if (array_key_exists($key, $courses)) {
        return $courses[$key];
    } else {
        return 'Curso não encontrado';
    }
}



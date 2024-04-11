<?php

define('SITE_URL', 'https://uniminasposead.com.br/');

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

    /*Slick*/
    wp_enqueue_script('customslick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.0.0', true);

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
        'gestao-e-logistica-e-economia' => 'Gestão, Logística e Economia',
        'marketing-e-coaching' => 'Marketing e Coaching',
        'meio-ambiente' => 'Meio Ambiente',
        'saude-e-estetica-e-farmacia' => 'Saúde, Estética e Fármacia',
        'seguranca-publica' => 'Segurança Publica',
        'tecnologia-da-informacao' => 'Tecnologia da Informação',
    ];

    if (array_key_exists($area, $area_name)) {
        return $area_name[$area];
    } else {
        return 'Area não encontrado';
    }
}


function load_more_courses() {
    $per_page = 5; // Número de cursos por página
    $page = $_POST['page'];
    $area_name = $_POST['area'];
    $area_file = "{$area_name}";

    $courses_json_area = file_get_contents($area_file);
    $decode_courses = json_decode($courses_json_area);

    $offset = ($page - 1) * $per_page;

    // Prepara os cursos a serem enviados
    $courses_to_send = array();
    for ($i = $offset; $i < min($offset + $per_page, count($decode_courses)); $i++) {
        $course_name = $decode_courses[$i]->titulo;
        $course_url = $decode_courses[$i]->url;
        $course_objective = $decode_courses[$i]->conteudo->objetivos;
        $courses_to_send[] = array(
            'title' => $course_name,
            'url' => $url . $course_url,
            'objective' => mb_strimwidth($course_objective, '0', '140', '...')
        );
    }

    // Envia os cursos como resposta JSON
    wp_send_json($courses_to_send);
}

add_action('wp_ajax_load_more_courses', 'load_more_courses');
add_action('wp_ajax_nopriv_load_more_courses', 'load_more_courses');

function form_data_send() {

    $bodyData = json_decode(stripslashes($_POST['formData']), true);

    $apiKey = "21778ce4-5c3d-4f2b-91e6-c6db024dd9c1";
    $url = 'https://api.moskitcrm.com/v2/deals';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($bodyData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-Moskit-Origin: ',
        'apikey: ' . $apiKey
    ));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpCode == 200) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
    curl_close($ch);
    return $response;

}
add_action('wp_ajax_form_data_send', 'form_data_send');
add_action('wp_ajax_nopriv_form_data_send', 'form_data_send');
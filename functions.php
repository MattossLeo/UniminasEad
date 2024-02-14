<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/inc/template-functions.php';

function home_script_enqueue() {
    /*CSS*/
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    /*JavaScript*/
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0.0', true);
    /*Slick Slider*/
    wp_enqueue_script( 'customslickjs', get_template_directory_uri() . '/assets/js/slick.js', array(), '1.0.0', true);
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

function ppr($pre) {
    ?>
    <pre>
       <?php echo $pre?>
   </pre>
    <?php
}

function course_area($area){
    $area_name = [
        'direito' => 'Direito',
        'educacao' => 'Educação',
        'saude' => 'Saúde',
        'psicologia' => 'Psicologia',
        'empresarial' => 'Empresarial',
        'servico-social' => 'Serviço Social',
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

function form_contact(){
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $checkyes = $_POST['checkyes'];
    $checkno = $_POST['checkno'];
    $data = array([
        'nome' => $name,
        'email' => $mail,
        'phone' => $phone,
        'checkbox' => $checkyes,
        'checkno' => $checkno
    ]);
    wp_send_json($data);
    return $data;
}
add_action('wp_ajax_form_contact', 'form_contact');
add_action('wp_ajax_nopriv_form_contact', 'form_contact');

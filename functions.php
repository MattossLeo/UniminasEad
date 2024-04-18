<?php
/*Garantir que a URL do site seja  uniminasposead.com.br*/
define('SITE_URL', 'https://uniminasposead.com.br/');

/*Inclusão do arquivos de rotas*/
require_once get_template_directory() . '/routes.php';

/*Função para imprimir resultados variados em array de visualização*/
function ppr($pre) {
    ?>
    <pre>
       <?php print_r($pre)?>
   </pre>
    <?php
}

/* Função que inclui os arquivos de JS CSS e BOOTSTRAP*/
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

/*Função para adicionar Menus*/
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

/*Função para conversão de areas*/
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

/*Paginação*/
function load_more_courses() {
    $per_page = 6; // Número de cursos por página
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

/*Ajax Formularios*/
function form_data_send(){
    function getDatabaseConnection() {
        $servername = "mysql.uniminasposead.com.br";
        $username = "uniminasposead04";
        $password = "Mktuniminas24";
        $dbname = "uniminasposead04";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }
        return $conn;
    }
    function incrementAndGetCounter() {
        $conn = getDatabaseConnection();
        try {
            $conn->begin_transaction();
            $conn->query("UPDATE form_submissions SET count = count + 1 WHERE id = 1");
            $result = $conn->query("SELECT count FROM form_submissions WHERE id = 1");
            $row = $result->fetch_assoc();
            $conn->commit();
            return $row['count'];
        } catch (mysqli_sql_exception $e) {
            $conn->rollback();
            echo "Erro ao incrementar o contador: " . $e->getMessage();
            exit;
        } finally {
            $conn->close();
        }
    }

    $bodyData = $_POST['formData'];
    function processFormSubmission($bodyData) {

        $uniqueCounter = incrementAndGetCounter();
        return $bodyData['name'] . $uniqueCounter;
    }
    $sendDeal = [
        "id"          => 74221,
        "createdBy"   => ['id' => 98411 ],
        "responsible" => ['id' => 98411 ],
        "dateCreated" => $bodyData['dateCreate'],
        "name"        => processFormSubmission($bodyData),
        "price"       => floatval($bodyData['price']),
        "source"      => "MOSKIT_API_V2",
        "origin"      => "SITE PRINCIPAL",
        "status"      => "OPEN",
        "closeDate"   => "string",
        "entityCustomFields"=> [
            [
                'id'=> 'CF_nrLDXoiVCaAgPmOa',
                'textValue'=> $bodyData['email'],
                'options'=> [0]
            ],
            [
                'id'=> 'CF_rpGmBPioCn6QEqeR',
                'textValue'=> $bodyData['whatsapp'],
                'options'=> [0]
            ],
            [
                'id'=> 'CF_dVKmQ5i1CwY1PmWR',
                'textValue'=> $bodyData['graduation'],
                'options'=> [0]
            ],
            [
                'id'=> 'CF_oJZmP1iKCV0JzDgv',
                'textValue'=> "SITE PRINCIPAL",
                'options'=> [0]
            ],
            [
                'id'=> 'CF_G21qV7ilCe68YMAX',
                'textValue'=> $bodyData['area'],
                'options'=> [0]
            ],
            [
                'id'=> 'CF_eZYm9BiyCo0gZD47',
                'textValue'=> $bodyData['course'],
                'options'=> [0]
            ]
        ],
        "stage" => [ 'id'=> 347501]
    ];
    $apiKey = "21778ce4-5c3d-4f2b-91e6-c6db024dd9c1";
    $url = 'https://api.moskitcrm.com/v2/deals';


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($sendDeal));
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
        echo json_encode(array(
            'erro' => 'Not send',
            'httpCode' => $httpCode,
            'response' => json_decode($response, true),
            'sentData' => $sendDeal
        ));
    }
    curl_close($ch);
    return $response;

}
add_action('wp_ajax_form_data_send', 'form_data_send');
add_action('wp_ajax_nopriv_form_data_send', 'form_data_send');



function normalizeString($str) {
    $str = mb_convert_encoding($str, 'UTF-8', 'UTF-8');
    $str = mb_strtolower($str, 'UTF-8');
    return $str;
}

/*Função de busca*/
function search_courses(){
    $json_courses = "/home/uniminasposead/www/wp-content/themes/uniminasposead/inc/course/areas.json";
    $courses_json_content = file_get_contents($json_courses);
    $courses_list = json_decode($courses_json_content, true);
    $jsonFiles = $courses_list['cursos'];

    if (isset($_POST['searchData'])) {

        $searchCourses = normalizeString($_POST['searchData']);
        $response = [];

        $basePath = "/home/uniminasposead/www/wp-content/themes/uniminasposead/inc/course/";

        foreach ($jsonFiles as $jsonFile) {
            $filePath = $basePath . $jsonFile;

            if (file_exists($filePath)) {
                $course_content = file_get_contents($filePath);
                $courses = json_decode($course_content, true);

                foreach ($courses as $course) {
                    $tituloLower = normalizeString($course['titulo']);
                    $urlLower = normalizeString($course['url']);

                    if (mb_stripos($tituloLower, $searchCourses) !== false || mb_stripos($urlLower, $searchCourses) !== false) {
                        $response[] = [
                            'titulo' => $course['titulo'],
                            'url' => $course['url'],
                            'area' => $course['area']
                        ];
                    }
                }
            }
        }

        header('Content-Type: application/json');
        wp_send_json($response);
        die();
        return json_encode($response);
    }
}

add_action('wp_ajax_search_courses', 'search_courses');
add_action('wp_ajax_nopriv_search_courses', 'search_courses');

/*Função para o checkout*/
function getQueryValues($url) {
    $query = parse_url($url, PHP_URL_QUERY);
    parse_str($query, $params);
    return array_values($params);
}
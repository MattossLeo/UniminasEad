<?php
function createURL() {
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    echo "URL solicitada: $url<br>"; // Debug: Verifica se a URL está sendo capturada corretamente

    $servername = "mysql.uniminasposead.com.br";
    $username = "uniminas01_add1";
    $password = "Mkt@uniminas24";
    $dbname = "uniminasposead01";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou");
    }

    $query = "SELECT area_slug FROM areas"; // Supondo que você tenha uma coluna 'area_slug' no banco de dados para armazenar os slugs das áreas.

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $slug = $row["area_slug"];
            $routes["/pos-graduacao/$slug/"] = true;
        }
    } else {
        echo "0 resultados";
    }

    $conn->close();

    echo "Rotas configuradas: "; // Debug: Verifica se as rotas foram configuradas corretamente
    print_r($routes);

    if (array_key_exists($url, $routes)) {
        include $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/page-area.php';
        exit;
    } else {
        // Rota não encontrada, lidar com isso aqui
        echo "Rota não encontrada";
    }
}
get_header();

include get_template_directory() . '/blocks/area/main-banner-area.php';
include get_template_directory() . '/blocks/area/area-search.php';

include get_template_directory() . "/blocks/home/seven-day-guarantee.php";
include get_template_directory() . "/blocks/home/accelerate-your-growth.php";
include get_template_directory() . "/blocks/home/seven-day-guarantee.php";
include get_template_directory() . '/blocks/faq.php';

get_footer();
<?php
$per_page = 6;
$page = isset($_POST['page']) ? (int) $_POST['page'] : 1;


$offset = ($page - 1) * $per_page;


$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);
$area_name = basename($url_path);

$json_courses = get_template_directory() . "/inc/course/areas.json";
$courses_json_content = file_get_contents($json_courses);

if ($courses_json_content !== false) {
    $courses_data = json_decode($courses_json_content, true);
    if ($courses_data !== null && isset($courses_data['cursos'])) {
        $area_file_path = array_search($area_name . '.json', $courses_data['cursos']);
        if ($area_file_path !== false) {
            $area_file = get_template_directory() . "/inc/course/" . $courses_data['cursos'][$area_file_path];
            $courses_json = file_get_contents($area_file);
            $decode_courses = json_decode($courses_json);

            for ($i = $offset; $i < min($offset + $per_page, count($decode_courses)); $i++) {
                $course = $decode_courses[$i];
                $course_name = $course->titulo;
                $course_url = $course->url;
                $course_objective = $course->conteudo->objetivos;
                ?>
                <div class="col-lg-4">
                    <div class="main__card--courses">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="course--main__card">
                                        <div class="card__courses--title">
                                            <h2 class="tittle-courses color-white"><?php echo $course_name; ?></h2>
                                        </div>
                                        <div class="card__courses--content">
                                            <p class="courses-texts color-white"><?php echo mb_strimwidth($course_objective, '0', '120', '...'); ?></p>
                                        </div>
                                    </div>
                                    <div class="card__courses--price">
                                        <?php if(trim($course_name) === 'ENGENHARIA DE SEGURANÇA DO TRABALHO' || trim($course_name) === 'GEORREFERENCIAMENTO DE IMÓVEIS RURAIS'){?>
                                            <p class="main__fake--price">De: <s class="fake-price">12x 140,00</s></p>
                                            <p class="main-prices color-white">Por: <b>12x120,00</b></p>
                                        <?php }else{?>
                                            <p class="main__fake--price">De: <s class="fake-price">12x 51,90</s></p>
                                            <p class="main-prices color-white">Por: <b>12x43,90</b></p>
                                        <?php }?>
                                    </div>
                                    <div class="main__card--btn">
                                        <a class="btn-courses" href="<?php echo $url . $course_url ?>">CONHEÇER O CURSO</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <?php
            }
        }
    }
}
?>
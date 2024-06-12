<?php
/*--Pagination--*/

$per_page = 6;
$page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
$offset = ($page - 1) * $per_page;

/*--Courses--*/

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
            $decode_courses = json_decode($courses_json, true);
            $initial_courses = $decode_courses[0]['sevenHundredTwenty'];
            /*ppr($initial_courses);
            die()*/;
            ?>
            <div class="col-lg-12">
                <div class="main__workload--buttons">
                    <div class="workload-720">
                        <button id="workload720h" class="button-workload button-720">720H</button>
                    </div>
                    <div class="workload-360">
                        <button id="workload360h" class="button-workload button-360">360H</button>
                    </div>
                </div>
            </div>
            <?php
            for ($i = $offset; $i < min($offset + $per_page, count($initial_courses)); $i++) {
                $course = $initial_courses[$i];
                $course_name = $course['titulo'];
                $course_url = $course['url'];
                $course_objective = $course['conteudo']['objetivos'];
                $course_fake_price = $course['fakePrice'];
                $course_price = $course['price'];
                ?>
                <div class="col-lg-4">
                    <div class="main__card--courses">
                        <div class="course--main__card">
                            <div class="card__courses--title">
                                <h2 class="tittle-courses"><?php echo $course_name; ?></h2>
                            </div>
                            <div class="card__courses--content">
                                <p class="courses-texts"><?php echo mb_strimwidth($course_objective, 0, 120, '...'); ?></p>
                            </div>
                        </div>
                        <div class="card__courses--price">
                                <p class="main__fake--price">De: <s class="fake-price">12x <?php echo $course_fake_price ?></s></p>
                                <p class="main-prices">Por: <b>12x <?php echo $course_price ?></b></p>
                        </div>
                        <div class="main__card--btn">
                            <a class="btn-courses" href="<?php echo $url . $course_url ?>">CONHECER O CURSO</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}
?>

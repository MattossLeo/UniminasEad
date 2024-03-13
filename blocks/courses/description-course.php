<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);

$url_separate = explode('/', $url_path);
$course_name = $url_separate['3'];
$area_name = $url_separate['2'] . '.json';

$json_courses = "/home/uniminasposead/www/wp-content/themes/uniminasposead/inc/course/$area_name";
$courses_json = file_get_contents($json_courses);
$courses = json_decode($courses_json);
$filtered_courses = array_filter($courses, function ($course) use ($course_name) {
    return $course->url === $course_name;
});

?>
<section class="description-course">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php
                foreach ($filtered_courses as $course){
                    /*ppr($course);*/
                    $course_objective = $course->conteudo->objetivos;
                    $course_public = $course->conteudo->publico_alvo;
                    $course_disciplines = $course->conteudo->carga_horaria->disciplinas;
                    ?>
                    <div class="main__course--description">

                        
                    </div>
                    <?php
                    foreach ($course_disciplines as $disciplines){
                        ppr($disciplines->nome);
                    }

                }
                ?>
            </div>
        </div>
    </div>
</section>

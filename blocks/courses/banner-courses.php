<?php

$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);

$url_separate = explode('/', $url_path);
$course_name = $url_separate[3];
$area_json = $url_separate[2] . '.json';
$area_name = $url_separate[2];

$json_courses = get_template_directory() . "/inc/course/$area_json";
$courses_json = file_get_contents($json_courses);
$courses = json_decode($courses_json);

$courses_720 = $courses[0]->sevenHundredTwenty;
$courses_360 = $courses[0]->threeHundredSixty;

$workloads_array = array_merge($courses_720, $courses_360); // Combine os arrays em um só

$filtered_courses = array_filter($workloads_array, function ($course) use ($course_name) {
    return $course->url === $course_name;
});

foreach ($filtered_courses as $course) {
    $course_title = $course->titulo;
    $workload = $course->conteudo->carga_horaria->carga_horaria_total;
    ?>
    <section class="banner-courses" style="background: url('<?php echo get_template_directory_uri()?>/assets/img/banners/<?php echo $area_name?>.webp')no-repeat;background-size: cover;padding: 150px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main__course--banner">
                        <p class="course__sub-title">Pós-Graduação Ead em</p>
                        <h2 class="title-course"><?php echo $course_title; ?></h2>
                        <p class="banner-description">Prepare-se para uma jornada de desenvolvimento de habilidades cruciais para o sucesso profissional com o nosso curso de <b><?php echo mb_convert_case($course_title, MB_CASE_TITLE, 'utf8'); ?></b>, abrangendo comunicação, liderança, resolução de problemas e colaboração, impulsionando não apenas sua carreira, mas também seu crescimento pessoal e profissional.</p>
                    </div>
                    <div class="main__info--card">
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg" alt="green-check">
                            <p class="text__info--options">Instituição <b>Credenciada pelo MEC</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg" alt="green-check">
                            <p class="text__info--options">Conclusão minima<b> em 3 meses</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg" alt="green-check">
                            <p class="text__info--options">Certificado Digitalizado</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="course__banner--description">
                                <div class="course-workload">
                                    <p class="text-workload">Carga Horária:<br><b><?php echo $workload; ?></b></p>
                                </div>
                                <div class="course-modality">
                                    <p class="text-modality">Modalidade:<br><b>Online</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-top: 20px" class="course__banner--btn">
                            <div class="btn__choose-your-course btn-banner">
                                <span class="border-green">&nbsp;</span>
                                <a href="#" class="main__banner--btn open__popup--btn">FAZER MATRÍCULA</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>

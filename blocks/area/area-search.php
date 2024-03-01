<section class="area-search">
    <div class="container">
        <div class="row">
            <div class="main__title--search">
                <h2 class="main__title--h2 color-dark--green">Encontre seu curso</h2>
                <div class="main__subititle--search">
                    <img width="60" height="56"
                         src="<?php echo get_template_directory_uri() ?>/assets/img/search-certifier.svg"
                         alt="search-certifier">
                    <p class="main__text--subtitle color-dark--green">Cursos reconhecidos pelo MEC, por Portaria nº 314,
                        de 2 de março de 2020.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="search--course">
                    <div class="input__search">
                        <input class="main__input--search" id="searchCourse" type="search"
                               placeholder="Digite o curso que você procura">
                        <div class="main__icon--search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">


                <?php
                $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $url_path = parse_url($url, PHP_URL_PATH);
                $area_name = basename($url_path);


                $json_courses = "/home/uniminasposead/www/wp-content/themes/uniminasposead/inc/course/courses.json";
                $courses_json = file_get_contents($json_courses);
                $area = $area_name . '.json';


                if ($courses_json !== false) {

                    $courses_data = json_decode($courses_json, true);
                    if ($courses_data !== null && isset($courses_data['cursos'])) {

                        if (in_array($area, $courses_data['cursos'])) {
                            $area_file = "/home/uniminasposead/www/wp-content/themes/uniminasposead/inc/course/$area";
                            $courses_json = file_get_contents($area_file);
                            $decode_courses = json_decode($courses_json);

                            foreach ($decode_courses as $key => $courses) {
                                /*ppr($courses);*/
                                $course_name = $courses->titulo;
                                $course_url = $courses->url;
                                $course_objective = $courses->Objetivos;
                                ?>


                                <div class="main__card--courses">
                                    <div class="row align-items-end">
                                        <div class="col-lg-9">
                                            <div class="card__courses--title">
                                                <h2 class="tittle-courses color-white"><?php echo $course_name; ?></h2>
                                            </div>
                                            <div class="card__courses--content">
                                                <p class="courses-texts color-white"><?php echo mb_strimwidth($course_objective, '0', '140', '...'); ?></p>
                                            </div>
                                            <div class="card__courses--price">
                                                <p class="main-prices color-white"><b>12x25,90</b>&nbsp;&nbsp;&nbsp;<s
                                                            class="fake-price">12x 39,90</s></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="main__card--btn">
                                                <a class="btn-courses" href="<?php echo $url . $course_url ?>">CONHEÇER
                                                    O CURSO</a>
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
            </div>
        </div>
    </div>
</section>



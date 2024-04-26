<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);

$url_separate = explode('/', $url_path);
$course_name = $url_separate['3'];
$area_name = $url_separate['2'] . '.json';

$json_courses = "/home/faculdadeuniminasead/www/pos/wp-content/themes/uniminasposead/inc/course/$area_name";
$courses_json = file_get_contents($json_courses);
$courses = json_decode($courses_json);
$filtered_courses = array_filter($courses, function ($course) use ($course_name) {
    return $course->url === $course_name;
});

?>
<section class="description-course">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <?php
                foreach ($filtered_courses as $course){
                    $course_name = $course->titulo;
                    $course_objective = $course->conteudo->objetivos;
                    $course_public = $course->conteudo->publico_alvo;
                    $course_disciplines = $course->conteudo->carga_horaria->disciplinas;
                    $full_workload = $course->conteudo->carga_horaria->carga_horaria_total;
                    ?>
                    <div class="main__course--description">
                        <div class="main__course--objective">
                            <h3 class="title-target-audience">Objetivos</h3>
                            <p class="objective-text main-text"><?php echo $course_objective;?></p>
                        </div>
                        <div class="main__course--target-audience">
                            <h3 class="title-target-audience">Publico Alvo</h3>
                            <p class="objective-text main-text"><?php echo $course_public;?></p>
                        </div>
                        <div class="main__course--disciples">
                            <h3 class="title-target-audience">Modulos</h3>
                            <?php foreach ($course_disciplines as $disciplines){
                                /*ppr($course);*/
                                $disciplines_name = $disciplines->nome;
                                $disciplines_ch = $disciplines->ch;
                            ?>
                                    <div class="main__diciplines--infos">
                                        <p class="diciplines-text main-text"><?php echo $disciplines_name;?></p>
                                        <p class="diciplines-text main-text">| <?php echo $disciplines_ch;?></p>
                                    </div>

                            <?php } ?>
                            <div class="main__diciplines--infos">
                                <p class="diciplines-text main-text">Carga Horária Total</p>
                                <p class="diciplines-text main-text"><?php echo $full_workload;?></p>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
            </div>
            <div class="col-lg-5">
                <div class="main__styck--options">
                    <div class="main__cout--down">
                        <p class="countdown-title">Essa promoção acaba em:</p>
                        <h2 style="margin: 0;" id="countdown"></h2>
                    </div>
                    <div class="main__items--options">
                        <div class="main__prices">
                            <?php if(trim($course_name) === 'ENGENHARIA DE SEGURANÇA DO TRABALHO' || trim($course_name) === 'GEORREFERENCIAMENTO DE IMÓVEIS RURAIS'){?>
                                <p class="price-course"><b>12x 120,00</b></p>
                                <p class="fake-price-course"><s>12x140,00 </s>No cartão</p>
                            <?php }else{?>
                                <p class="price-course"><b>12x R$43,90</b></p>
                                <p class="fake-price-course"><s>12x R$51,90 </s>No cartão</p>
                            <?php }?>
                        </div>
                        <div class="items-options">
                            <div class="main__items--content">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                                <p class="main-options">100% Online</p>
                            </div>
                            <div class="main__items--content">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                                <p class="main-options">Credenciado pelo MEC</p>
                            </div>
                            <div class="main__items--content">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                                <p class="main-options">Início imediato</p>
                            </div>
                            <div class="main__items--content">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                                <p class="main-options">TCC opcional</p>
                            </div>
                            <div class="main__items--content">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                                <p class="main-options">Sem taxa de matrícula</p>
                            </div>
                            <div class="main__items--content">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                                <p class="main-options">Conclusão em 6 meses</p>
                            </div>
                            <div class="main__items--content">
                                <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                                <p class="main-options">Certificado Digitalizado</p>
                            </div>
                        </div>
                        <div class="item-bonus">
                            <h3 class="title-bonus">Bônus</h3>
                            <p class="bonus__text--option">1 Pós Graduação Gratuita</p>
                        </div>
                        <div class="main__button--offer">
                            <button class="open__popup--btn main__button--form">FAZER MATRÍCULA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

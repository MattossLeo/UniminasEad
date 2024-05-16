<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);
$area_name = basename($url_path);
$area = course_area($area_name);

?>

<section class="main-banner-area" style="background: url('<?php echo get_template_directory_uri()?>/assets/img/banners/<?php echo $area_name?>.webp')no-repeat;background-size: cover;padding: 150px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="home__banner--content">
                    <p class="main__text--span text-mob-center color-white">Pós Graduação em</p>
                    <h2 class="main__title--h2 title--areas"><?php echo $area; ?></h2>
                    <p class="home__text--banner text-mob-center color-white">Aprimore suas <b>habilidades e abra portas para novas oportunidades</b> com nossa <b>Pós-graduação em <?php echo $area; ?></b> Conte com nossa experiência e dedicação à qualidade para <b>impulsionar sua carreira rumo ao sucesso.</b></p>
                    <div class="main__info--card">
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg"
                                 alt="green-check">
                            <p class="text__info--options">Instituição <b>Credenciada pelo MEC</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg"
                                 alt="green-check">
                            <p class="text__info--options">Cursos com <b>conclusão em 3 meses</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg"
                                 alt="green-check">
                            <p class="text__info--options">Certificado Digitalizado</p>
                        </div>
                    </div>
                    <div class="btn__choose-your-course btn-banner">
                        <span class="border-green">&nbsp;</span>
                        <a class="main__banner--btn" href="#areacourse">ESCOLHA SEU CURSO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
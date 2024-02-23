<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// Remove o protocolo e o host da URL
$url_path = parse_url($url, PHP_URL_PATH);
// Obtém apenas a última parte da URL (sem a barra final, se houver)
$area_name = basename($url_path);
$area = course_area($area_name);
$banner = '';
$banner_text = '';

switch ($area_name) {
    case 'direito':
        $banner = '/wp-content/themes/uniminasead/assets/img/banners/banner-area-direito.webp';
        $banner_text = 'Aprimore suas <b>habilidades e conquiste novas oportunidades</b> na área jurídica com nossa <b>Pós-graduação em Direito.</b> Conte com nossa expertise e compromisso com a <b>excelência para impulsionar sua carreira.</b>';
        break;
    case 'educacao':
        $banner = '/wp-content/themes/uniminasead/assets/img/banners/banner-area-educacao.webp';
        $banner_text = 'Aprimore suas <b>habilidades e abra portas para novas oportunidades</b> na área educacional com nossa <b>Pós-graduação em Educação.</b> Conte com nossa experiência e dedicação à qualidade para <b>impulsionar sua carreira rumo ao sucesso.</b>';
        break;
    case 'saude':
        $banner = 'banner-saude.jpg';
        break;
    case 'psicologia':
        $banner = 'banner-psicologia.jpg';
        break;
    case 'empresarial':
        $banner = 'banner-empresarial.jpg';
        break;
    case 'servico-social':
        $banner = 'banner-servico-social.jpg';
        break;
    default:
        $banner = 'banner-generico.jpg';
        break;
}
?>
<section class="main-banner-area" style="background: url(<?php echo $banner;?>)no-repeat;background-size: cover;padding: 150px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="home__banner--content">
                    <p class="main__text--span text-mob-center color-white">Pós Graduação em</p>
                    <h2 class="main__title--h2 color-white bigger-title"><?php echo $area;?></h2>
                    <p class="home__text--banner text-mob-center color-white"><?php echo $banner_text;?></p>
                    <div class="main__info--card">
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                            <p>Instituição <b>Credenciada pelo MEC</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                            <p>Cursos com <b>conclusão em 3 meses</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri()?>/assets/img/green-check.svg" alt="green-check">
                            <p>Certificado Digitalizado</p>
                        </div>
                    </div>
                    <div class="btn__choose-your-course btn-banner">
                        <span class="border-green">&nbsp;</span>
                        <a class="main__banner--btn" href="#areaCourse">ESCOLHA SEU CURSO</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
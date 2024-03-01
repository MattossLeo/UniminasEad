<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$url_path = parse_url($url, PHP_URL_PATH);

$area_name = basename($url_path);
$area = course_area($area_name);
$banner = '';
$banner_text = '';

switch ($area_name) {
    case 'artes-moda-e-musica':
        $banner = '/wp-content/themes/uniminasead/assets/img/banners/banner-area-direito.webp'; // Substitua pelo caminho real do banner
        $banner_text = 'Aprimore suas <b>habilidades e conquiste novas oportunidades</b> com a nossa <b>Pós-graduação em Artes Moda e Musíca.</b> Conte com nossa expertise e compromisso com a <b>excelência para impulsionar sua carreira.</b>';
        break;
    case 'ciencias':
        $banner = 'banner-ciencias.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Ciências';
        break;
    case 'comunicacao-social':
        $banner = 'banner-comunicacao-social.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Comunicação Social';
        break;
    case 'concursos':
        $banner = 'banner-concursos.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Concursos';
        break;
    case 'direito':
        $banner = '/wp-content/themes/uniminasead/assets/img/banners/banner-area-direito.webp';
        $banner_text = 'Aprimore suas <b>habilidades e conquiste novas oportunidades</b> na área jurídica com nossa <b>Pós-graduação em Direito.</b> Conte com nossa expertise e compromisso com a <b>excelência para impulsionar sua carreira.</b>';
        break;
    case 'educacao':
        $banner = '/wp-content/themes/uniminasead/assets/img/banners/banner-area-educacao.webp';
        $banner_text = 'Aprimore suas <b>habilidades e abra portas para novas oportunidades</b> na área educacional com nossa <b>Pós-graduação em Educação.</b> Conte com nossa experiência e dedicação à qualidade para <b>impulsionar sua carreira rumo ao sucesso.</b>';
        break;
    case 'empresarial-e-mba':
        $banner = 'banner-empresarial-e-mba.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Empresarial e MBA';
        break;
    case 'engenharia-e-arquitetura':
        $banner = 'banner-engenharia-e-arquitetura.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Engenharia e Arquitetura';
        break;
    case 'esportes':
        $banner = 'banner-esportes.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Esportes';
        break;
    case 'gastronomia':
        $banner = 'banner-gastronomia.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Gastronomia';
        break;
    case 'gestao-e-logistica-e-economia':
        $banner = 'banner-gestao-e-logistica-e-economia.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Gestão, Logística e Economia';
        break;
    case 'marketing-e-coaching':
        $banner = 'banner-marketing-e-coaching.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Marketing e Coaching';
        break;
    case 'meio-ambiente':
        $banner = 'banner-meio-ambiente.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Meio Ambiente';
        break;
    case 'psicologia':
        $banner = 'banner-psicologia.jpg';
        $banner_text = 'Texto para a área de Psicologia';
        break;
    case 'saude-e-estetica-e-farmacia':
        $banner = 'banner-saude-e-estetica-e-farmacia.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Saúde, Estética e Farmácia';
        break;
    case 'seguranca-publica':
        $banner = 'banner-seguranca-publica.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Segurança Pública';
        break;
    case 'servico-social':
        $banner = 'banner-servico-social.jpg';
        $banner_text = 'Texto para a área de Serviço Social';
        break;
    case 'tecnologia-da-informacao':
        $banner = 'banner-tecnologia-da-informacao.jpg'; // Substitua pelo caminho real do banner
        $banner_text = 'Texto para a área de Tecnologia da Informação';
        break;
    default:
        break;
}
?>









<section class="main-banner-area"
         style="background: url(<?php echo $banner; ?>)no-repeat;background-size: cover;padding: 150px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="home__banner--content">
                    <p class="main__text--span text-mob-center color-white">Pós Graduação em</p>
                    <h2 class="main__title--h2 color-white bigger-title"><?php echo $area; ?></h2>
                    <p class="home__text--banner text-mob-center color-white"><?php echo $banner_text; ?></p>
                    <div class="main__info--card">
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg"
                                 alt="green-check">
                            <p>Instituição <b>Credenciada pelo MEC</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg"
                                 alt="green-check">
                            <p>Cursos com <b>conclusão em 3 meses</b></p>
                        </div>
                        <div class="main__infos--options color-white">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/img/green-check.svg"
                                 alt="green-check">
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
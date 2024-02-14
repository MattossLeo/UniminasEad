<?php wp_footer();

$menu_footer_instucional = array(
    'theme_location' => 'Menu Institucional',
    'menu_class' => 'menu_footer',
    'menu_id' => 'menuInstitucional',
);
$menu_footer_areas = array(
    'theme_location' => 'Menu Areas',
    'menu_class' => 'menu_footer',
    'menu_id' => 'menuAreas',
);
?>
<section class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="main__menu--instiucional content__main--footer">
                    <div class="main__bar--footer">&nbsp;</div>
                    <div class="footer__menu--title">
                        <p class="menu--title">Institucional</p>
                    </div>
                    <div class="footer__menu--content">
                        <?php wp_nav_menu($menu_footer_instucional);?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="main__menu--areas content__main--footer">
                    <div class="main__bar--footer">&nbsp;</div>
                    <div class="footer__menu--title">
                        <p class="menu--title">Áreas</p>
                    </div>
                    <div class="footer__menu--content">
                        <?php wp_nav_menu($menu_footer_areas);?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="main__menu--contato content__main--footer">
                    <div class="main__bar--footer">&nbsp;</div>
                    <div class="footer__contato--title">
                        <p class="menu--title">Atendimento</p>
                    </div>
                    <div class="footer__contato--content">
                        <p class="footer__text--p">contato@uniminasead.com.br</p>
                        <p class="footer__text--p">ouvidoria@uniminasead.com.br</p>
                        <p class="footer__text--p">(00) 99999-9999</p>
                        <p class="footer__text--p">(00) 99999-9999</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="main__menu--social content__main--footer">
                    <div class="main__bar--footer">&nbsp;</div>
                    <div class="footer__social--title">
                        <p class="social--title">Redes Socias</p>
                    </div>
                    <div class="footer__social--content">
                        <a class="main__social--img" href="#">
                            <img loading="lazy" width="28" height="28" src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/facebook.svg" alt="social-img">
                        </a>
                        <a class="main__social--img" href="#">
                            <img loading="lazy" width="29" height="23" src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/twitter.svg" alt="social-img">
                        </a>
                        <a class="main__social--img" href="#">
                            <img loading="lazy" width="31" height="21" src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/youtube.svg" alt="social-img">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="end-footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="end__footer--logo">
                    <img width="178" height="47" src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/Logo-Uniminas-Branco.svg" alt="Logo">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="end__footer--content">
                    <p class="end__footer--text color-white">Rua Ouro Preto 290, Centro, Ipatinga/Mg - CEP: 35160-020</p>
                    <p class="end__footer--text color-white"><strong>Horário de atendimento:</strong> Das 9h às 21h30 de segunda à sexta, aos sábados das 8h às 16h Grupo Focus de Educação LTDA - CNPJ: 14.334.814/0001-77</p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
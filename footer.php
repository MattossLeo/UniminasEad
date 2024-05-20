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
                        <div class="service-locations-secretaria">
                            <p>Secretaria:</p>
                            <a href="mailto:secretariauniminas@gmail.com"><p class="footer__text--p">secretariauniminas@gmail.com</p></a>
                            <a href="https://api.whatsapp.com/send?phone=55319983438807&text=Ol%C3%A1%21+preciso+falar+com+a+secretaria.+Poderia+me+ajudar+?"><p class="footer__text--p">(31) 98343-8807</p></a>
                        </div>
                        <div class="service-locations-pedagogico">
                            <p>Pedagógico:</p>
                            <a href="https://api.whatsapp.com/send?phone=55319983438807&text=Ol%C3%A1%21+preciso+falar+com+o+pedagogico.+Poderia+me+ajudar+?"><p class="footer__text--p">(31) 98347-1427</p></a>
                        </div>
                        <div class="service-locations-documentos">
                            <p>Documentos:</p>
                            <a href="https://api.whatsapp.com/send?phone=5531982855101&text=Ol%C3%A1%21+preciso+falar+com+o+documentos.+Poderia+me+ajudar+?"><p class="footer__text--p">(31) 98285-5101</p></a>
                        </div>
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
                        <a class="main__social--img" href="https://www.facebook.com/UniMinasEAD">
                            <img loading="lazy" width="28" height="28" src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/facebook.svg" alt="social-img">
                        </a>
                        <a class="main__social--img" href="https://www.instagram.com/eaduniminas/">
                            <img loading="lazy" width="29" height="23" src="<?php echo esc_url(get_template_directory_uri())?>/assets/img/instagram.svg" alt="social-img">
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
                    <p class="end__footer--text color-white"><strong>Horário de atendimento:</strong><br> De segunda à quinta, das 8h00 às 18h00 e sexta das 8h00 às 17h00 <br> Faculdade Uniminas LTDA - CNPJ: 43.283.797/0001-94</p>
                </div>
            </div>
        </div>
    </div>
    <div class="main__copyright">
        <p>Copyright © 2024 – Desenvolvido por Faculdade Uniminas</p>
    </div>

    <!-- Pop-up Formulário (inicialmente oculto) -->
    <div id="popupForm" class="popup">
        <div class="container">
                <?php echo get_template_part('template-parts/form', null, null, null)?>
        </div>

    </div>
</section>
</body>
</html>
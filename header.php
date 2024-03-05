<!DOCTYPE html>
<html>
<head>
    <title>Uniminas EaD</title>
    <meta charset="UTF-8">
    <meta name="description" content="Pós Graduação EaD">
    <meta name="keywords" content="Uniminas EAD, Pós-graduação a distância, Cursos de pós-graduação, Especialização EAD, Uniminas Pós-graduação, Modalidade EAD, Cursos online, Diploma de pós-graduação, Educação a distância, Uniminas Cursos EAD, Pós-graduação em EAD, Uniminas Especialização, Ensino a distância, Uniminas Pós-graduação EaD">
    <meta name="author" content="Uniminas EaD">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <!--Slick Js-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--Font Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/101e17e4b2.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<body>
<?php
$menu_principal = array(
    'theme_location' => 'Menu Principal',
    'menu_class' => 'menu_header',
    'menu_id' => 'menuHeader',
);
$menu_mobile = array(
    'theme_location' => 'Menu Mobile',
    'menu_class' => 'menu_header-mob',
    'menu_id' => 'menuMob',
    'container_class' => 'menu-mob',
);
?>
<section class="main__header">
    <div class="container">
        <div class="row">
            <div class="main__content-header">
                <div class="main__header--logo">
                    <a href="<?php echo esc_url(get_site_url())?>">
                        <img width="178" height="47" src="<?php echo get_template_directory_uri()?>/assets/img/Logo-Uniminas-Branco.svg" alt="Logo">
                    </a>
                </div>
                <div class="main__header--menu">
                    <?php wp_nav_menu($menu_principal);?>
                </div>
                <div class="main__header--btn">
                    <a class="header__btn--student-area" target="_blank" href="https://ava.uniminasead.com.br">Área do Aluno</a>
                </div>
                <div class="header__menu--mobile">
                    <img class="main__menu--svg" width="40" height="28" src="<?php echo get_template_directory_uri()?>/assets/img/menu.svg" alt="mob-menu-img">
                    <div class="menu__mob--content">
                        <div class="main__menu--mob">
                            <?php wp_nav_menu($menu_mobile);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


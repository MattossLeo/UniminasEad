<!DOCTYPE html>
<html>
<head>
    <title>Uniminas EaD</title>
    <meta charset="UTF-8">
    <meta name="description" content="Obrigado">
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
<body style="zoom: .8;">
<section class="erro-404">
    <div style="display: flex; justify-content: center" class="main__404--img">
        <img style="height: 100vh" src="<?php echo get_template_directory_uri()?>/assets/img/404.webp" alt="Error">
    </div>
    <div style="display: none;" class="main__404--mob">
        <img style="width:100%; height: auto" src="<?php echo get_template_directory_uri()?>/assets/img/404mob.webp" alt="Error">
    </div>
    <style>
        @media only screen and (max-width: 767px){
            .main__404--img{
                display: none !important;
            }
            .main__404--mob{
                display: flex !important;
                justify-content: center;
                height: 80vh;
                margin-top: 60px;
            }
        }
    </style>
</section>
<?php wp_footer()?>
</body>
</html>
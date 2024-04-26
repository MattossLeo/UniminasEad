<?php session_start();
$course = $_SESSION['course'];
$email = $_SESSION['email'];
?>
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

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '428657689862769');
        fbq('trackCustom','<?php echo $course?>');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=428657689862769&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Meta Pixel Code -->


    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NGVT8NTF');</script>
    <!-- End Google Tag Manager -->
</head>
<body style="background: #1e1e1e">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NGVT8NTF"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<script type="text/javascript">
    let course = <?php echo json_encode($course)?>;
    let email = <?php echo json_encode($email)?>;
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'customEvent',
        customTag: course,
        customEmail: email
    });
</script>
<section style="height: auto" class="main__page--thank-you">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page__thank-you--content">
                    <div class="thank-you__img">
                        <a href="<?php echo esc_url(get_site_url())?>">
                            <img width="537" height="auto" class="img-thanks" src="<?php echo get_template_directory_uri()?>/assets/img/logo-bigger.svg" alt="Logo">
                        </a>
                    </div>
                    <div class="thank-you__text">
                        <p class="text__p-thanks">Muito obrigado!<br>Um de nossos Consultores Educacionais<br>entrará em contato através do WhatsApp para dar continuidade.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
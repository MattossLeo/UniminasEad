<?php get_header();

$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_content = getQueryValues($url);

$student_name = $url_content[0];
$student_number = $url_content[1];
$student_mail = $url_content[2];
$course_choose = $url_content[3];

?>

<section class="checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main__checkout--header">
                    <div class="main__checkout--header-img">
                        <img width="50" height="50" src="<?php echo get_template_directory_uri()?>/assets/img/medals.svg" alt="medals">
                    </div>
                    <h2 class="color-white title-checkout">Você esta comprando:<br> Pós Graduação em <?php echo $course_choose ?> pela Faculdade Uniminas</h2>
                </div>
            </div>
            <div class="main__checkout--body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__body--content">
                            <div class="checkout__first--step">
                                <div class="first__step--title">
                                    <span class="first__step--number">1/</span>
                                    <p class="first__step--text">CONFIRME SEUS DADOS PESSOAIS</p>
                                </div>
                                .first__step--form
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
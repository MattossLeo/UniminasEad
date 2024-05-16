<section class="area-couse" id="areacourse">
    <div class="container">
        <div class="row">
<?php
$json_courses =  get_template_directory() . "/inc/course/areas.json";
$courses_json = file_get_contents($json_courses);
$areas = json_decode($courses_json);
$json_areas = $areas->cursos;
foreach ($json_areas as $areas_courses) {
    $area_url = substr($areas_courses, '0', '-5');
    $area_name = course_area($area_url);
    ?>
    <div class="col-lg-4">
        <a style="background: url('<?php echo get_template_directory_uri()?>/assets/img/banners/<?php echo $area_url?>.webp')no-repeat;background-size: cover;" href="<?php echo esc_url(get_site_url())?>/pos-graduacao/<?php echo $area_url ?>" class="main__card--area">
            <div class="cards_areas">
                <h3 class="main__title--h3 cards__title--areas"><?php echo esc_html($area_name)?></h3>
                <span class="btn__show--courses">ESCOLHA SEU CURSO</span>
            </div>
        </a>
    </div>
<?php } ?>
        </div>
    </div>
</section>




